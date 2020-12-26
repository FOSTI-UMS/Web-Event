<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Mail\ConfirmMail;
use App\Mail\peserta;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Alert;

class ParticipantController extends Controller
{
    public function download($slug)
    {
        $data = Event::where('slug', $slug)->value('nama_event');
        $download = Event::where('slug', $slug)->value('slug');
        $participant = Participant::where('event', $data)->get();
        return view('events.datafull', compact('participant','data','download'));
    }
    public function events()
    {
        $events = Event::orderBy('waktu','desc')->paginate(6);

        return view('participant.index', compact('events'));
    }

    public function oprec()
    {
        return redirect('http://oprec.fostiums.org');
    }
    public function maintenance()
    {
        return view('errors.503');
    }

    
        public function registerEvent($slug)
    {
        $reg = Event::where('slug', $slug)->first();

        $recents = Event::orderBy('waktu', 'desc')->take(3)->get();
        // Cek if page exist
        if(empty($reg)) abort(404);

        // cek expired or full booked
        $date = new Carbon;

        $count = Participant::where('event','=',$reg->nama_event)
                            ->where('email_verified_at','!=','null')->count();

        if($date > $reg->waktu)
        {
            return view('participant.expi');
        }
        else if($count >= $reg->max_partic)
        {
            return view('participant.full');
        }
         else {
            //stil to go
        }

        //Page View
        $reg->increment('views'); // add a new page view to our `views` column by incrementing it

        return view('participant.registerparti', compact('reg', 'recents'));
    }
    public function konfirmasi(Request $request)
    {
        $participan = count( Participant::where('email_verified_at','!=','null')->get());
        
        $max_parti = Event::where('nama_event','=',$request->event)->first();
        
        if($participan >= $max_parti->max_partic){
            Alert::warning('Maaf Kuota sudah penuh','SUDAH PENUH :(')->persistent();
            return redirect()->back();
        }

        
        if (Participant::where('email', $_GET['email'])->first() !=null) {
                Participant::where('email','=',$_GET['email'])
                            ->update(['email_verified_at'=>date('Y-m-d H:i:s')]);

                Alert::warning('Anda sudah terdaftar sebagai peserta silahkan kontak fostiums@gmail.com jika ada pertanyaan','Selamat Anda Terdaftar')->persistent();
                return redirect()->route('Homepage');
            
          }else{
            Alert::warning('Email yang anda tuju tidak terdaftar','TIDAK TERDAFTAR')->persistent();
            return redirect()->back();
          }
        // if(isset($request->konfirmasi)){
        //     Participant::create([
        //         'nama' => $request->nama,
        //         'nim' => $request->nim,
        //         'email' => $request->email,
        //         'hp' => $request->hp,
        //         'event' => $request->event,
        //     ]);
        // }else{
        //     abort(404);
        // }
    }
    public function postRegister(Request $request, $slug)
    {
        
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'acara' => 'required',
            'g-recaptcha-response' => 'required|captcha'
          ]);

          $event = Event::where('slug',$slug)->value('nama_event');

          if (Participant::where('email', $request->email)->where('event', $request->acara)->first() != null) {
            Alert::warning('Anda sudah mendaftar, silahkan cek email anda atau kontak fostiums@gmail.com','Sudah Terdaftar')->persistent();
            return redirect()->back();
          }
          $recents = Event::orderBy('waktu', 'desc')->take(3)->get();

          $dataParti=[
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'hp' => $request->hp,
            'event' => $event,
        ];

        //   Create qr
          $qrstring = base64_encode($request['nama'].'/'.$request['nim'].'/'.$request->email.'/'.$request->hp.'/'.$event);
          // Passing data
          // view()->share('data',$data);
          view()->share(['dataParti' => $dataParti, 'qrstring' => $qrstring]);

        Mail::send('mails/mail', ['dataParti' => $dataParti], function ($message) use ($request)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to($request->email);

            //Add a subject
            $message->subject("Konfirmasi Pendaftaran ".$request->acara);

        });


        //   return view('parti')->back()->with('message', 'Silahkan cek e-mail anda..');
        //   return view('participant.berhasil', compact('dataParti', 'recents'));
        return redirect('');
    }



    function kirimEmail(Request $request,$slug)
    {
        // Mail::to("cobasaja@aku.com")->send(new peserta());
        
        
        if (Participant::where('email', $request->email)->where('event', $request->acara)->first() != null) {
            Alert::warning('Anda sudah mendaftar, silahkan cek email anda atau kontak fostiums@gmail.com','Sudah Terdaftar')->persistent();
            return redirect()->back();
          }


        $event = Event::where('slug',$slug)->value('nama_event');
        $parti = new Participant;
        $parti->nama = $request->nama;
        $parti->nim = $request->nim;
        $parti->email = $request->email;
        $parti->hp = $request->hp;
        $parti->event = $event;
        $parti->save();

        $dataParti=[
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'hp' => $request->hp,
            'event' => $event,
        ];
        $recents = Event::orderBy('waktu', 'desc')->take(3)->get();
        $qrstring = base64_encode($request['nama'].'/'.$request['nim'].'/'.$request->email.'/'.$request->hp.'/'.$event);
        // Passing data
        // view()->share('data',$data);
        view()->share(['dataParti' => $dataParti, 'qrstring' => $qrstring]);
        Mail::send('mails/konfirm', ['dataParti' => $dataParti], function ($message) use ($request)
        {

            $message->from('fostiums@gmail.com', 'FOSTI UMS Forum Open Source Teknik Informatika');

            $message->to($request->email);

            //Add a subject
            $message->subject("Konfirmasi Pendaftaran ".$request->acara);

        });
        // echo "email terkirim";
        return view('participant.successred',compact('dataParti', 'recents'));
    }

    function done()
    {
        return view('participant.verifydone');
    }

}
