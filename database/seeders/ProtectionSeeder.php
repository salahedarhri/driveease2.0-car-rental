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
            $faker = Faker::create();

            Protection::create([
              'type'=> 'Basique',
              'details'=> $faker->sentence,
              'prixCaution' =>15000,
              'prixFranchise'=>12000,                
            ]);

            Protection::create([
              'type'=> 'Medium',
              'details'=> $faker->sentence,
              'prixCaution' =>7000,
              'prixFranchise'=>7000,                
            ]);

            Protection::create([
              'type'=> 'Premium',
              'details'=> $faker->sentence,
              'prixCaution' =>2000,
              'prixFranchise'=>0,                
            ]);
        }
    }

