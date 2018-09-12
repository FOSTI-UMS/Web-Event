<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function events()
    {
        $events = Event::orderBy('waktu','desc')->paginate(5);

        return view('participant.acara', compact('events'));
    }

    public function registerEvent($slug, $id)
    {
        $reg = Event::where('slug', $slug)->first();

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

        return view('participant.register', compact('reg'));
    }
    public function postRegister(Request $request)
    {

    }
}
