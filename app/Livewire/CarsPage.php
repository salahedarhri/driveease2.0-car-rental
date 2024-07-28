<?php

namespace App\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;

class CarsPage extends Component
{
    public function mount(){
        SEOTools::setTitle('Voitures');
        SEOTools::setDescription('Profitez des avantages exclusifs de louer chez DriveEase :
            large choix de véhicules modernes, tarifs compétitifs, assistance 24/7, et processus de réservation rapide et facile.
            Conduisez en toute sérénité avec DriveEase, votre partenaire de confiance pour la location de voitures au Maroc,
            notamment à Agadir, Casablanca et Marrakech. Louez des voitures pas cher et partez à l\'aventure !');
        SEOTools::opengraph()->setUrl( env('APP_URL').'/voitures' );
        SEOTools::setCanonical( env('APP_URL').'/voitures' );
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('site_name', 'DriveEase');
        SEOTools::jsonLd()->addImage( asset('images/composants/voiture-cote-400w.jpg'));
    }

    public function render(){
        return view('livewire.cars-page')->extends('layouts.client')->section('content');  
    }
}
