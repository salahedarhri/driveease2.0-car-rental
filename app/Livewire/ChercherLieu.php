<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lieu;

class ChercherLieu extends Component {

    public $lieuDepart, $lieuRetour ="";
    public $indicDepart , $indicRetour = null;
    public $suggestionsDepart , $suggestionsRetour = [];

    public function chercherLieu( $lieu, $suggestions ){

        usleep(300000);
        
        $suggestions = [];

        if( strlen($lieu) >= 3){
            $suggestions = Lieu::where('ville','like','%'.$lieu.'%')
                                ->orWhere('nom', 'LIKE', '%'.$lieu.'%')
                                ->limit(10)
                                ->get();    }
        
                
        return $suggestions;
    }

    public function appliquerLieuDepart( $lieu, $id ){
        $this->suggestionsDepart = [];
        $this->lieuDepart = $lieu;
        $this->indicDepart = $id;

    }

    public function appliquerLieuRetour( $lieu, $id ){
        $this->suggestionsRetour= [];
        $this->lieuRetour = $lieu;
        $this->indicRetour = $id;
    }

    public function render() {

        $suggestionsDepart = [];
        $suggestionsRetour = [];

        if( $this->indicDepart != null ){
            $lieuDepSelect = Lieu::find( $this->indicDepart);
            $nomLieuDepSelect = $lieuDepSelect->nom;
        }
        if($this->indicDepart == null || $this->lieuDepart != $nomLieuDepSelect ){
            $suggestionsDepart = $this->chercherLieu($this->lieuDepart, $suggestionsDepart);
        }

        if( $this->indicRetour != null ){
            $lieuRetSelect = Lieu::find( $this->indicRetour);
            $nomLieuRetSelect = $lieuRetSelect->nom;
        }
        if($this->indicRetour == null || $this->lieuRetour != $nomLieuRetSelect ){
            $suggestionsRetour = $this->chercherLieu($this->lieuRetour, $suggestionsRetour);
        }

        return view('livewire.chercher-lieu',[
             'lieuxDepart' => $suggestionsDepart,
             'lieuxRetour' => $suggestionsRetour,
            ]);
    }

}

 

