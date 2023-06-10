<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GenConfig>
 */
class GenConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sitename'=>'Université Technologie Kanyik Tesh',
            'sigle'=>'Ukatesh',
            'description'=>"Université Technologique Kanyik Tesh, une formation, un parcours et une assurance",
            'logo'=>'',
            'bg_image'=>'',
            'email'=>'info@ukatesh.org',
            'phone'=>'+243 99 25 22 582',
            'adress'=>'54, Av/Du30/Juin, Q/Latin, KZI',
            'favicon48'=>'',
            'favicon16'=>'',
            'appleicon18'=>'',
            'facebook'=>'https://fr-fr.facebook.com/',
            'youtube'=>'https://www.youtube.com/',
            'linkedin'=>'https://fr.linkedin.com/',
            'twitter'=>'https://twitter.com/',
        ];
    }
}
