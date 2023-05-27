<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeUserController extends Controller
{
    public function index()
    {
        return view('administration.ui.typeUser.index');
    }
}
