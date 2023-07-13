<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return view('ui.galeries.index',[
            'galeries'=>Galery::orderBy('type_id','DESC')->paginate(12),
        ]);
    }

}
