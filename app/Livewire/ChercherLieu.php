<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lieu;

class ChercherLieu extends Component
{
    public $lieuDepart ='';
    public $lieuRetour ='';

    public function chercherLieu( $lieu ){

        $suggestions = [];

        if( strlen($lieu >= 3)){
            $suggestions = Lieu::where('ville','like','%'.$lieu.'%')
                                ->orWhere('nom', 'LIKE', '%'.$lieu.'%')
                                ->limit(7)
                                ->get();
        }
        return $suggestions;
    }

    public function render() {

        $suggestionsDepart = [];
        $suggestionsRetour = [];

        $suggestionsDepart = $this->chercherLieu($this->lieuDepart);
        $suggestionsRetour = $this->chercherLieu($this->lieuRetour);


        return view('livewire.chercher-lieu',[
             'lieuxDepart' => $suggestionsDepart,
             'lieuxRetour' => $suggestionsRetour,
            ]);
    }
}
