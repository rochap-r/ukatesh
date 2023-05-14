<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    protected $fillable=['name','title','path','extension','type_id',];

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
