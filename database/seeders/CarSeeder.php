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
        for ($i = 0; $i < 50; $i++) {

            $faker = Faker::create();

            //Slug using modele :
            $modele = $faker->words(2,true);
            $slug = Str::slug($modele);

            Car::create([
                'modele'=>$modele,
                'protection'=> $faker->words(1,true),
                'description'=> $faker->sentence,
                'prix'=> $faker->randomFloat(0,200, 700),
                'disponibilite'=> $faker->boolean,

                'transmission'=> $faker->randomElement(['Auto','Manuelle']),
                'moteur'=> $faker->randomElement(['Diesel','Hybride','Gasoil','Electrique']),
                'ville'=> $faker->randomElement(['Agadir','Marrakech','Casablanca']),
                'nbPers'=> $faker->numberBetween(4,7),
                'minAge'=> $faker->numberBetween(18,26),
                'climatisation'=> $faker->boolean,

                'slug'=>$slug,
                'photo'=>$faker->randomElement(['car (1).png', 'car (2).png', 'car (3).png', 'car (4).png']),
            ]);

        }
    }
}
