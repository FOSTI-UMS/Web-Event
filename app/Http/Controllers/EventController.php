<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use File;
use Alert;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        $events = Event::all();

        // return view('events.indexevent', ['events' => $events]);
        return view('home', compact('events'));
    }

    public function create()
    {
        $events = Event::all();
        return view('events.createevent', compact('events'));
    }
    public function data($slug)
    {
        $data = Event::where('slug', $slug)->value('nama_event');
        $download = Event::where('slug', $slug)->value('slug');
        $events = Event::all()->first();
        $participant = Participant::where('event', $data)->get();
        return view('events.data', compact('participant','events','data','download'));
    }

    public function new()
    {
        return view('auth.register');
    }

    public function adminevent()
    {
        $events = Event::orderBy('waktu','desc')->get();
        $peserta = Participant::all()->first();
        $date = new Carbon;
        return view('events.adminevent', compact('events','peserta','date'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'namaevent' => 'required',
            'max' => 'required',
            'tgl' => 'required',
            'tempat' => 'required',
            'pamflet' => 'mimes:jpeg,jpg,png|max:2000',
            'deskripsi' => 'required',
            'cp' => 'required'
          ]);

        // buat slug url
        $slug = str_slug($request->namaevent, '-');

        // cek slug kembar
        if (Event::where('slug', $slug)->first() != null) {
            $slug = $slug . '-' . time();
        }

        // Penamaan event
        $namaEvent = $request->namaevent . ' '.  now()->year;

        if ($request->file('pamflet') != null){
        // penamaan gambar
        $img = time(). '.png';
        // request gambar
        $request->file('pamflet')->storeAs('pamflet/', $img);
        }
        else {
            $img = null;
        }

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
            'htm' => $request->biaya,
            'cp' => $request->cp,
            'slug' => $slug,
            'views' => 0
          ]);

        Alert::success('','Event Berhasil Ditambahkan')->persistent();
        return redirect('/omah/daftar');
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
        $events = Event::orderBy('waktu','desc')->get();

        if(!$data) abort(404);
        return view('events.edit', compact('events','data'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namaevent' => 'required',
            'max' => 'required',
            'tgl' => '',
            'pamflet' => 'mimes:jpeg,jpg,png|max:2000',
            'deskripsi' => 'required',
            'cp' => 'required'
          ]);

        //   cek if exist
        $update = Event::findOrFail($id);
        // buat slug url
        $slug = str_slug($request->namaevent, '-');

        // cek slug kembar
        if (Event::where('slug', $slug)->first() != null) {
            $slug = $slug . '-' . time();
        }

        // Penamaan event
        $namaEvent = $request->namaevent;

        if ($request->tgl) {
          // Convert date
          $waktu = Carbon::parse($request->tgl);
        }
        else {
          $waktu = Event::where('id',$id)->value('waktu');
        }

        if ($request->file('pamflet')) {
          // penamaan gambar
          $img = time(). '.png';
          // request gambar
          $request->file('pamflet')->storeAs('pamflet/', $img);
        }
        else {
          $img = Event::where('id',$id)->value('pamflet');
        }


        $update->update([
            'nama_event' => $namaEvent,
            'max_partic' => $request->max,
            'waktu' => $waktu,
            'pamflet' => $img,
            'deskripsi' => $request->deskripsi,
            'htm' => $request->biaya,
            'cp' => $request->cp,
            'slug' => $slug
          ]);
        Alert::success('','Event Berhasil Diedit')->persistent();
        return redirect('omah/daftar');
    }

    
    public function destroy($id)
    {
        $del = Event::find($id);
        File::delete('images/pamflet/'.$del->pamflet);
        $del->delete();
  
        Alert::success('','Event Berhasil Dihapus')->persistent();
        return redirect('/omah/daftar');
    }
        public function hapus($id)
    {
        $del = Participant::findOrFail($id)->delete();
  
        Alert::success('','Peserta Berhasil Dihapus')->persistent();
        return redirect()->back();
    }

}
