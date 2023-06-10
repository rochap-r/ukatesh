<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts=$category->posts()
            ->where('approved',1)
            ->orderBy('id','desc')
            ->paginate(10);
        $lastPost=$category->posts()->latest()->firstOrFail();
        return view('ui.categories.index',[
            'posts'=>$posts,
            'categorie'=>$category,
            'lastPost'=>$lastPost,
        ]);
    }

}
