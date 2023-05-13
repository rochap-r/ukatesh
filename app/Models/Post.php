<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'body',
        'user_id',
        'category_id'
    ];

    //image relation
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    // user author relation
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // categorie relation
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
