<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Protection;
use Faker\Factory as Faker;


class ProtectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5 ; $i++) {
                
            $faker = Faker::create();

            Protection::create([
                'type'=> $faker->randomElement(['Basique','Medium','Premium']),
                'details'=> $faker->sentence,                
            ]);
        }
    }
}
