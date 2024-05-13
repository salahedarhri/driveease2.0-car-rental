<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;
use App\Models\Conducteur;
use App\Models\Reservation;
use Carbon\Carbon;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class ValiderReservation extends Component{
    public $dateDepart; 
    public $dateRetour; 
    public $dateDepartDt; 
    public Carbon $dateDepartCarbon;
    public $dateRetourDt; 
    public Carbon $dateRetourCarbon;
    public $lieuDepart; 
    public $lieuRetour;
    public $nbJrs; 
    public $minAge; 
    
    //Voiture
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

    public function mount($dateDepart, $dateRetour, $lieuDepart, $lieuRetour, $minAge, $voiture){
        $this->dateDepart = $dateDepart;
        $this->dateRetour = $dateRetour;
        $this->lieuDepart = $lieuDepart;
        $this->lieuRetour = $lieuRetour;
        $this->minAge = $minAge;

        $this->dateDepartCarbon = Carbon::parse($this->dateDepart);
        $this->dateRetourCarbon = Carbon::parse($this->dateRetour);

        $this->nbJrs = max(1, $this->dateRetourCarbon->diffInDays($this->dateDepartCarbon));

        $this->dateDepartDt = $this->dateDepartCarbon->format('d-m-Y H:i');
        $this->dateRetourDt = $this->dateRetourCarbon->format('d-m-Y H:i');

        if($voiture){
            $this->voiture = Car::where('slug',$voiture)->first();   
        }

        $this->prtcChoisiId = session('prtc_choisi');
        $this->optnsIds = session('optnsIds');
    }

    public function RetournerVoitures(){
        if(session()->has('optnsIds')){
            session()->forget('optnsIds');
        }

        if(session()->has('prtc_choisi')){
            session()->forget('prtc_choisi');
        }

        return redirect()->route('VoituresDisponibles',[
            'dateDepart'=> $this->dateDepart,
            'dateRetour'=> $this->dateRetour,
            'lieuDepart'=> $this->lieuDepart,
            'lieuRetour'=> $this->lieuRetour,
            'minAge'=> $this->minAge,
        ]);
    }

    public function RetournerProtection(){

        return redirect()->route('Protection&Options',[
            'dateDepart'=> $this->dateDepart,
            'dateRetour'=> $this->dateRetour,
            'lieuDepart'=> $this->lieuDepart,
            'lieuRetour'=> $this->lieuRetour,
            'minAge'=> $this->minAge,
            'voiture'=>$this->voiture->slug,
        ]);
    }

    public function validerConducteur(){
        $this->validate( $this->rules, $this->message );

        $this->dateDepart = $this->dateDepartCarbon->toDateTimeString();
        $this->dateRetour = $this->dateRetourCarbon->toDateTimeString();

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
        $reservation->idCar = $this->voiture->id;
        $reservation->idProtection = $this->prtcChoisiId;
        $reservation->lieuDepart = trim($this->lieuDepart);
        $reservation->lieuRetour = trim($this->lieuRetour);
        $reservation->dateDepart = trim($this->dateDepart);
        $reservation->dateRetour = trim($this->dateRetour);
        $reservation->minAge = trim($this->minAge);
        $reservation->moyenPaiement = 'En Agence';
        $reservation->save();

        $reservation->options()->attach($this->optnsChoisi);
        session(['reservation' => $reservation->id ]);

        // Mail::to($conducteur->email)->send( new WelcomeMail($conducteur, $reservation));

        return redirect()->route('email')->with('success','Réservation crée avec succès, Veuillez visiter votre espace Gmail !');
    }

    public function render(){
        
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
        ])->extends('layouts.client')->section('content');  
    }
}
