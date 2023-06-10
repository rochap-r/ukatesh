<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events=Evenement::latest()->where('approved',1)->orderBy('id','DESC')->take(4)->get();
        return view('ui.home',['events'=>$events]);
    }
}
