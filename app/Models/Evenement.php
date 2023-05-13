<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable=[
        'title', 'slug', 'content', 'lieu', 'tel', 'dat_event','email','user_id'
    ];


    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeSearch($query,$term)
    {
        $term="%$term%";
        $query->where(function($query) use ($term){
            $query->where('title','like',$term);
        });
    }
}
