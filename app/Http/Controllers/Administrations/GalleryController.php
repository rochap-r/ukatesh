<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function create()
    {
        return view('administration.ui.galleries.create');
    }

    public function edit()
    {
        return view('administration.ui.galleries.edit');
    }
    public function index()
    {
        return view('administration.ui.galleries.index');
    }

}
