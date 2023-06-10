<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable=[
        'about','about_img','project','project_img','galery'
    ];

    public function aboutImg(){
        return asset('assets/about/resized_'.$this->about_img);
    }
    public function projectImg(){
        return asset('assets/about/resized_'.$this->project_img);
    }


}
