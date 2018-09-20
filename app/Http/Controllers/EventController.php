<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        // $events = Event::get()->count();

        // return view('events.indexevent', ['events' => $events]);
        return view('home');
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
            'tempat' => 'required',
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
            'tempat' => $request->tempat,
            'pamflet' => $img,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug
          ]);

        return redirect('/omah/daftar')->with('message', 'Berhasil buat event');
    }

    public function daftarEvent()
    {
      
      $events = Event::orderBy('waktu','desc')->paginate(5);

      return view('events.daftarEvent', compact('events'));
    }

    public function show($slug)
    {
        $data = Event::where('slug', $slug)->first();
        $event = Event::where('slug',$slug)->value('nama_event');
        $parti = Participant::where('event', $event)->get();
        

        if(empty($data)) abort(404);

        return view('events.single', compact('data', 'parti'));
    }

    public function edit($id)
    {
        $data = Event::findOrFail($id);

        if(!$data) abort(404);
  
        return view('events.edit', compact('data'));
    }

    
    public function update(Request $request, $id)
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

        // Convert date
        $waktu = Carbon::parse($request->tgl);
        
        $create = Event::update([
            'nama_event' => $namaEvent,
            'max_partic' => $request->max,
            'waktu' => $waktu,
            'pamflet' => $img,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug
          ]);

        return redirect('/omah/daftar')->with('message', 'Berhasil edit event');
    }

    
    public function destroy($id)
    {
        $del = Event::find($id);
        $del->delete();
  
        return redirect('/omah/daftar')->with('Delete_succes', 'Artikel berhasil di hapus');
    }

}
