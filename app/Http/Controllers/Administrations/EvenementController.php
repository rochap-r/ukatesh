<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        return view('administration.ui.evenements.index');
    }
}
