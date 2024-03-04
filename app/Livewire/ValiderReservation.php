<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;
use Carbon\Carbon;
use App\Models\Reservation;

class ValiderReservation extends Component{
    public $dateDepart; 
    public $dateDepartString; 
    public $dateRetour; 
    public $dateRetourString; 

    public $dateDepartDt; 
    public $dateRetourDt; 
    public $lieuDepart; 
    public $lieuRetour;
    public $nbJrs; 
    public $minAge; 

    //Voiture
    private $idVoiture;
    public $voiture;

    //Protection
    private $prtcChoisiId;
    public $prtcChoisi;
    public $prixPrtc;

    //Options
    public $optnsIds;
    public $optnsChoisi;
    public $prixOptns;

    //Conducteur
    public $prenomConducteur;
    public $nomConducteur;
    public $emailConducteur;
    public $dateNsConducteur;
    public $numTelConducteur;

    protected $prixTotal;

    protected $rules = [
        'prenomConducteur'=>'required',
        'nomConducteur'=>'required',
        'numTelConducteur'=>'required',
        'dateNsConducteur'=>'required|date',
        'emailConducteur'=>'required|email',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'date' => 'La date doit être une date et heure valide.',
        'email' => 'L\'email doit être un email valide.',
    ];

    public function validerConducteur(){
        $this->validate( $this->rules, $this->message );
    }


    public function mount(){
        $this->dateDepart = session('dateDepart');
        $this->dateRetour = session('dateRetour');
        $this->dateDepartDt = session('dateDepartDt');
        $this->dateRetourDt = session('dateRetourDt');
        $this->lieuDepart = session('lieuDepart');
        $this->lieuRetour = session('lieuRetour');
        $this->nbJrs = session('nbJrs');
        $this->idVoiture = session('idVoiture');
        $this->minAge = session('minAge');
        $this->prtcChoisiId = session('prtc_choisi');
        $this->optnsIds = session('optnsIds');
    }

    public function render(){

        //Voiture
        $this->voiture = Car::find( $this->idVoiture );
        
        // Protection
        $this->prtcChoisi = Protection::find( $this->prtcChoisiId );
        $this->prixPrtc = (float)$this->prtcChoisi->prix * $this->nbJrs;

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
            'options' => $this->optnsChoisi,
            'nbJrs' => $this->nbJrs,

        ])->extends('layouts.client')->section('content');  
    }
}
