<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;


class EventController extends Controller
{
        
    public function index()
    {
        $events = Event::get()->count();

        // return view('greeting', ['name' => 'James']);
        return view('events.indexevent', ['events' => $events]);
    }

    public function create()
    {
        return view('events.createevent');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'namaevent' => 'required',
            'max' => 'required',
            'tgl' => 'required',
            'pamflet' => 'mimes:jpeg,jpg,png|required|max:2000',
            'deskripsi' => 'required'
          ]);

        // buat slug url
        $slug = str_slug($request->namaevent, '-');

        // cek slug kembar
        if (Event::where('slug', $slug)->first() != null) {
            $slug = $slug . '-' . time();
        }

        // Penamaan event
        $namaEvent = $request->namaevent . ' '.  now()->year;

        // penamaan gambar
        $img = time(). '.png';
        // request gambar
        $request->file('pamflet')->storeAs('pamflet/', $img);

        $waktu = Carbon::parse($request->tgl);
        // Carbon::createFromFormat('Y-m-d', $input_name); // whatever your input name is
        // Carbon::createFromFormat('m/d/Y', $request->start)->format('Y-m-d');
        // $sss = Carbon::createFromFormat('Y-m-d H:i:s', $das);
        
        $create = Event::create([
            'nama_event' => $namaEvent,
            'max_partic' => $request->max,
            'waktu' => $waktu,
            'pamflet' => $img,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug
          ]);

        return redirect('/data/daftar')->with('message', 'Silahkan cek e-mail anda..');
    }

    public function daftarEvent()
    {
      
      $events = Event::orderBy('waktu','desc')->paginate(5);

      return view('events.daftarEvent', compact('events'));
    }

    public function show($slug)
    {
        $data = Event::where('slug', $slug)->first();

        if(empty($data)) abort(404);

        return view('events.single', compact('data'));
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

}
