<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    // Type de photos de la galerie
    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }
}
