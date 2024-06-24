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
                'description'=> $faker->sentence,
                'prix'=> $faker->randomFloat(0,200, 700),
                'transmission'=> $faker->randomElement(['Auto','Manuelle']),
                'moteur'=> $faker->randomElement(
                    ['Diesel','Hybride','Gasoil','Electrique']),
                'ville'=> $faker->randomElement(
                    ['Agadir','Marrakech','Casablanca']),
                'nbPers'=> $faker->numberBetween(4,7),
                'minAge'=> $faker->numberBetween(18,26),
                'climatisation'=> $faker->boolean,

                'slug'=>$slug,
                'photo'=>$faker->randomElement([
                    'black-toyota-corolla-altis-car-400w.png',
                    'blue-four-wheel-drive-hyundai-tucson-car-400w.png',
                    'blue-shiny-bmw-car-400w.png',
                    'red-hyundai-car-400w.png',
                    'white-four-wheel-drive-mercedes-car-400w.png',
                    'white-toyota-corolla-car-400w.png',
                ]),
            ]);

        }
    }
}
