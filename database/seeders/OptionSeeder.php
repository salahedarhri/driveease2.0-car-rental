<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;
use Faker\Factory as Faker;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::create([
            'option'=>'Assistance Plus',
            'prix'=>'140',
            'description'=>"Avec l'Assistance Routière vous bénéficiez sans surcoût d'une assistance 24h/24 et 7j/7 en cas de pannes causées par vous ou suite à l'utilisation d'un mauvais carburant ou pour les pannes de carburant, la casse ou la perte des clés du véhicule, ainsi que les crevaisons et/ou ou des dommages aux pneus.",
            'urlPhoto'=>'option1.png',
        ]);

        Option::create([
            'option'=>'Protection personnelle accident',
            'prix'=>'160',
            'description'=>"Protégez vos proches. La protection individuelle contre les accidents indemnise le conducteur et les passagers en cas de décès ou de blessure et couvre les frais médicaux.",
            'urlPhoto'=>'option2.png',
        ]);

        Option::create([
            'option'=>'Conducteur supplémentaire',
            'prix'=>'250',
            'description'=>"Obligatoire pour les conducteurs de moins de 26 ans. Si vous supprimez cette option maintenant, vous devrez tout de même l’acheter en agence lors du retrait de votre véhicule. En plus tout conducteur doit avoir son permis de conduire depuis au moins un an (varie selon la catégorie du véhicule).",
            'urlPhoto'=>'option2.png',
        ]);

        Option::create([
            'option'=>'Conducteur supplémentaire',
            'prix'=>'250',
            'description'=>"Partez l'esprit tranquille et partagez le volant avec une autre personne assuré pour conduire. ",
            'urlPhoto'=>'option1.png',
        ]);
        
    }
}
