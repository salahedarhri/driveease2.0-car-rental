<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;

class ValiderReservation extends Component{

    public $dateDepart; 
    public $dateRetour; 
    public $dateDepartDt; 
    public $dateRetourDt; 
    public $lieuDepart; 
    public $lieuRetour;
    public $nbJrs; 
    public $minAge; 
    public $voiture;

    //Protection
    public $prtcChoisiId;
    public $prtcChoisi;
    public $prixPrtc;

    //Options
    public $optnsIds;
    public $optnsChoisi;
    public $prixOptns;

    public function mount(){
        
        $this->dateDepart = session('dateDepart');
        $this->dateRetour = session('dateRetour');
        $this->dateDepartDt = session('dateDepartDt');
        $this->dateRetourDt = session('dateRetourDt');
        $this->lieuDepart = session('lieuDepart');
        $this->lieuRetour = session('lieuRetour');

        $this->nbJrs = session('nbJrs');
        $this->voiture = session('voiture');
        $this->minAge = session('minAge');

        $this->prtcChoisiId = session('prtc_choisi');
        $this->optnsIds = session('optnsIds');
    }

    public function render(){

        // dd(session()->all());

        // Protection
        $this->prtcChoisi = Protection::find( $this->prtcChoisiId );
        $this->prixPrtc = $this->prtcChoisi->prix * $this->nbJrs;

        //Options
        if( !empty($this->optnsIds)){

            $this->optnsChoisi = Option::whereIn('id',$this->optnsIds)->get();
            $this->prixOptns = 0;

            foreach( $this->optnsChoisi as $optnChoisi){
                $this->prixOptns += $optnChoisi->prix;
            }
        }

        return view('livewire.resume',[
            'protectionChoisi' => $this->prtcChoisi,
            'voiture' => $this->voiture,
            'options' => $this->optnsChoisi,
            'nbJrs' => $this->nbJrs,
            ])->extends('layouts.client')->section('content');  
    }
}
