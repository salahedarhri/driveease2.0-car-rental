<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5 ; $i++) {

            $faker = Faker::create();

            Location::create([
                'city'=> $faker->words(1,true),
                'location'=> $faker->sentence,
            ]);

        }
    }
}