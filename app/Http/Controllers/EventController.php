<?php

namespace App\Http\Controllers;

use App\Models\Evenement;

class EventController extends Controller
{
    public function index()
    {
        $events=Evenement::latest()->where('approved',1)->with('author')->orderBy('id', 'DESC')->paginate(9);
        return view('ui.events.index',[
            'events'=>$events
        ]);
    }

    public function show(Evenement $event)
    {
        //dd($event->author);
        return view('ui.events.show',['event'=>$event]);
    }
}
