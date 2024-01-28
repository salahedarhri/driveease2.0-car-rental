<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lieu;

use Faker\Factory as Faker;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            Lieu::create([
                'nom' => $faker->sentence,
                'ville' => $faker->city,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    
    }
}
