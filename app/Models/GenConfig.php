<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenConfig extends Model
{
    use HasFactory;

    protected $fillable=[
        'sitename',
        'sigle',
        'description',
        'logo',
        'bg_image',
        'email',
        'phone',
        'adress',
        'favicon48',
        'favicon16',
        'appleicon18',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
    ];

    //image relation
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function getBg(){
        return asset('assets/images/img/'.$this->bg_image);
    }

    public function getLogo(){
        return asset('assets/favicons/'.$this->logo);
    }
    public function getIcon48(){
        return asset('assets/favicons/'.$this->favicon48);
    }

    public function getIcon16(){
        return asset('assets/favicons/'.$this->favicon16);
    }

    public function getAppleIcon18(){
        return asset('assets/favicons/'.$this->appleicon18);
    }
}
