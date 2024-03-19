<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;
use App\Models\Conducteur;
use App\Models\Reservation;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class ValiderReservation extends Component{
    public $dateDepart; 
    public $dateRetour; 
    public $dateDepartDt; 
    public $dateRetourDt; 
    public $lieuDepart; 
    public $lieuRetour;
    public $nbJrs; 
    public $minAge; 
    
    //Voiture
    public $idVoiture;
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

    public $prixTotal;

    protected $rules = [
        'prenomConducteur'=>'required',
        'nomConducteur'=>'required',
        'numTelConducteur'=>'required|unique:App\Models\Conducteur,num_tel',
        'dateNsConducteur'=>'required|date|before:today',
        'emailConducteur'=>'required|email|unique:App\Models\Conducteur,email',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'date' => 'La date doit être une date et heure valide.',
        'before:today' => 'La date doit être une date valide.',
        'email' => 'L\'email doit être un email valide.',
        'numTelConducteur.unique' => 'Ce numéro de téléphone est déjà utilisé.',
        'emailConducteur.unique' => 'Cette adresse email est déjà utilisée.',
    ];

    public function validerConducteur(){

        $this->validate( $this->rules, $this->message );

        //Conducteur
        $conducteur = new Conducteur;
        $conducteur->nom = trim($this->nomConducteur );
        $conducteur->prenom = trim($this->prenomConducteur );
        $conducteur->date_naissance = trim($this->dateNsConducteur );
        $conducteur->email = trim($this->emailConducteur );
        $conducteur->num_tel = trim($this->numTelConducteur );
        $conducteur->save();

        //Reservation
        $reservation = new Reservation;
        $reservation->idConducteur = $conducteur->id;
        $reservation->idCar = $this->idVoiture;
        $reservation->idProtection = $this->prtcChoisiId;
        $reservation->lieuDepart = trim($this->lieuDepart );
        $reservation->lieuRetour = trim($this->lieuRetour );
        $reservation->dateDepart = trim($this->dateDepart );
        $reservation->dateRetour = trim($this->dateRetour );
        $reservation->minAge = trim($this->minAge );
        $reservation->save();

        session([
            'reservation' => $reservation->id,
        ]);

        // Mail::to($conducteur->email)->send( new WelcomeMail($conducteur, $reservation));

        return redirect()->route('email')->with('success','Réservation crée avec succès, Veuillez visiter votre espace Gmail !');
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
