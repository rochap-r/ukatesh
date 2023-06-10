<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
    {
        return view('ui.rank.rank');
    }

    public function login()
    {
        return view('ui.rank.login');
    }
    public function register()
    {
        return view('ui.rank.register');
    }
}
