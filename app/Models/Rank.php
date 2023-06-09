<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    public $fillable=[
        'logo','name','description','visionTitle','missionTitle',
        'missionContent','memberTitle','memberContent','tel',
        'email','address','visionContent','condition','aboutHome'
    ];

    public function getLogo(){
        return asset('assets/rank/'.$this->logo);
    }


}
