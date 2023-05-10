<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        return view('administration.ui.types.index');
    }
}
