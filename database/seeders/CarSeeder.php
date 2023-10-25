<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Car;
use Faker\Factory as Faker;


require_once 'vendor/autoload.php';

class CarSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        //Slug using modele :
        $modele = $faker->words(3,true);
        $slug = Str::slug($modele);

        Car::create([
            'modele'=>$modele,
            'description'=> $faker->sentence,
            'prix'=> $faker->randomFloat(0,200, 700),
            'disponibilite'=> $faker->boolean,
            'slug'=>$slug,
            'photo'=>$faker->randomElement(['car-1.jpg', 'car-2.jpg', 'car-3.jpg']),
        ]);
    }
}
