<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('administration.ui.categories.index');
    }
}
