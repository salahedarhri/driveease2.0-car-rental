<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lieu;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $locations = [
                // Aéroports à Agadir
                ['nom' => 'Aéroport Al Massira', 'ville' => 'Agadir', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport Inzegane', 'ville' => 'Agadir', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport Agadir–Al Massira', 'ville' => 'Agadir', 'type' => 'Aéroport'],
            
                // Gares routières à Agadir
                ['nom' => 'Gare Routière Agadir', 'ville' => 'Agadir', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Inzegane', 'ville' => 'Agadir', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Tikiouine', 'ville' => 'Agadir', 'type' => 'Gare Routière'],
            
                // Aéroports à Marrakech
                ['nom' => 'Aéroport Marrakech Menara', 'ville' => 'Marrakech', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport de Marrakech-Ménara', 'ville' => 'Marrakech', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport Marrakech-Menara International', 'ville' => 'Marrakech', 'type' => 'Aéroport'],
            
                // Gares routières à Marrakech
                ['nom' => 'Gare Routière Marrakech', 'ville' => 'Marrakech', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Bab Doukkala', 'ville' => 'Marrakech', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Sidi Mimoun', 'ville' => 'Marrakech', 'type' => 'Gare Routière'],
            
                // Aéroports à Casablanca
                ['nom' => 'Aéroport Mohammed V', 'ville' => 'Casablanca', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport International Mohammed V', 'ville' => 'Casablanca', 'type' => 'Aéroport'],
                ['nom' => 'Aéroport de Casablanca-Anfa', 'ville' => 'Casablanca', 'type' => 'Aéroport'],
            
                // Gares routières à Casablanca
                ['nom' => 'Gare Routière Casablanca', 'ville' => 'Casablanca', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Oasis', 'ville' => 'Casablanca', 'type' => 'Gare Routière'],
                ['nom' => 'Gare Routière Sidi Bernoussi', 'ville' => 'Casablanca', 'type' => 'Gare Routière'],
            ];
        
        DB::table('lieux')->insert($locations);
    
        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {

        //     Lieu::create([
        //         'nom' => $faker->sentence,
        //         'ville' => $faker->city,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }    
    }
}
