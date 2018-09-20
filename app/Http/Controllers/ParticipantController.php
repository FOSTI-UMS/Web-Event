<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Event;
use App\Mail\ConfirmMail;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ParticipantController extends Controller
{
    public function events()
    {
        $events = Event::orderBy('waktu','desc')->paginate(6);

        return view('participant.index', compact('events'));
    }

    public function registerEvent($slug, $id)
    {
        $reg = Event::where('slug', $slug)->first();
        $recents = Event::orderBy('waktu', 'desc')->take(3)->get();
        // Cek if page exist
        if(empty($reg)) abort(404);

        // cek expired or full booked
        $date = new Carbon;
        $event = Event::where('id',$id)->value('nama_event');
        $max = Event::where('id',$id)->value('max_partic');

        $count = Participant::where('event','=',$event)->count();
        if($date > $reg->waktu)
        {
            return view('participant.expi');
        }
        else if($count >= $max)
        {
            return view('participant.full');
        }
         else {
            //stil to go 
        }

        return view('participant.registerparti', compact('reg', 'recents'));
    }
    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'acara' => '',
            'g-recaptcha-response' => 'required|captcha'
          ]);

          if (Participant::where('email', $request->email)->where('event', $request->acara)->first() != null) {
            return redirect()->back()->with('sudahdaftar', 'Anda sudah mendaftar, silahkan cek email anda atau kontak fostiums@gmail.com');
          }
          $recents = Event::orderBy('waktu', 'desc')->take(3)->get();

          $dataParti = Participant::create([
              'nama' => $request->nama,
              'email' => $request->email,
              'hp' => $request->hp,
              'event' => $request->acara,
          ]);

        //   Create qr
          $qrstring = base64_encode($dataParti->id.'/'.$request->nama.'/'.$request->email.'/'.$request->event);
          // Passing data
          // view()->share('data',$data);
          view()->share(['dataParti' => $dataParti, 'qrstring' => $qrstring]);

        Mail::send('mails/mail', ['dataParti' => $dataParti], function ($message) use ($request)
        {

            // $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to($request->email);

            //Add a subject
            $message->subject("Konfirmasi Pendaftaran ".$request->acara);

        });


        //   return view('parti')->back()->with('message', 'Silahkan cek e-mail anda..');
          return view('participant.berhasil', compact('dataParti', 'recents'));
    }
    
}
