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
            // Airports
            ['nom' => 'Al Massira Airport', 'ville' => 'Agadir', 'type' => 'Airport'],
            ['nom' => 'Marrakesh Menara Airport', 'ville' => 'Marrakech', 'type' => 'Airport'],
            ['nom' => 'Mohammed V International Airport', 'ville' => 'Casablanca', 'type' => 'Airport'],
            ['nom' => 'Fes-Saïss Airport', 'ville' => 'Fes', 'type' => 'Airport'],
            ['nom' => 'Rabat-Salé Airport', 'ville' => 'Rabat', 'type' => 'Airport'],
            ['nom' => 'Tangier Ibn Battuta Airport', 'ville' => 'Tangier', 'type' => 'Airport'],
            ['nom' => 'Moulay Ali Cherif Airport', 'ville' => 'Errachidia', 'type' => 'Airport'],
            ['nom' => 'Ouarzazate Airport', 'ville' => 'Ouarzazate', 'type' => 'Airport'],
            ['nom' => 'Nador International Airport', 'ville' => 'Nador', 'type' => 'Airport'],
            ['nom' => 'Essaouira-Mogador Airport', 'ville' => 'Essaouira', 'type' => 'Airport'],
            ['nom' => 'Ifrane Airport', 'ville' => 'Ifrane', 'type' => 'Airport'],
            ['nom' => 'Beni Mellal Airport', 'ville' => 'Beni Mellal', 'type' => 'Airport'],
            ['nom' => 'Dakhla Airport', 'ville' => 'Dakhla', 'type' => 'Airport'],
            ['nom' => 'Oujda Angads Airport', 'ville' => 'Oujda', 'type' => 'Airport'],
            ['nom' => 'Laayoune Hassan I Airport', 'ville' => 'Laayoune', 'type' => 'Airport'],
            
            // Bus Stations
            ['nom' => 'Agadir Bus Station', 'ville' => 'Agadir', 'type' => 'Bus Station'],
            ['nom' => 'Marrakech Bus Station', 'ville' => 'Marrakech', 'type' => 'Bus Station'],
            ['nom' => 'Casablanca Bus Station', 'ville' => 'Casablanca', 'type' => 'Bus Station'],
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
