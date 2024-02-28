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
        'numTelConducteur'=>'required|regex:/(01)[0-9]{9}/',
        'dateNsConducteur'=>'required|date',
        'emailConducteur'=>'required|email',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'date' => 'La date doit être une date et heure valide.',
        'email' => 'L\'email doit être un email valide.',
        'regex:/(01)[0-9]{9}/' => 'Le numéro doit être un numéro de téléphone valide.',
    ];

    public function validerConducteur(){
        $this->validate( $this->rules, $this->message );

        dump(session()->all());
    }

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
        
        // Protection
        $this->prtcChoisi = Protection::find( $this->prtcChoisiId );
        $this->prixPrtc = $this->prtcChoisi->prix * $this->nbJrs;

        //Options
        if( !empty($this->optnsIds)){
            $this->optnsChoisi = Option::whereIn('id',$this->optnsIds)->get();
            $this->prixOptns = 0;

            foreach( $this->optnsChoisi as $optnChoisi){
                $this->prixOptns += $optnChoisi->prix;
            }}

        $this->prixTotal = $this->prixPrtc + $this->prixOptns;

        session([ 'prixTotal' => $this->prixTotal ]);

        return view('livewire.resume',[
            'protectionChoisi' => $this->prtcChoisi,
            'voiture' => $this->voiture,
            'options' => $this->optnsChoisi,
            'nbJrs' => $this->nbJrs,

        ])->extends('layouts.client')
        ->section('content');  
    }
}
