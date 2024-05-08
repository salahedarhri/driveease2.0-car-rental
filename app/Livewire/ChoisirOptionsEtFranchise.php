<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Carbon\Carbon;
use App\Models\Protection;
use App\Models\Option;

class ChoisirOptionsEtFranchise extends Component{

    public $dateDepart, $dateRetour ;
    public $dateDepartDt, $dateRetourDt;
    public $lieuDepart, $lieuRetour;
    public $nbJrs, $minAge, $voiture;

    // Protection et Option Choisi
    public $prtcChoisi;
    public $prixPrtc;
    public $prixOptns;

    //pour retourner aux sections précédentes
    public $prtcChoisiId = null;
    public $optnsIds = [];
     

    public function mount($dateDepart, $dateRetour, $lieuDepart, $lieuRetour, $minAge, $voiture){

        $this->dateDepart = $dateDepart;
        $this->dateRetour = $dateRetour;
        $this->lieuDepart = $lieuDepart;
        $this->lieuRetour = $lieuRetour;
        $this->minAge = $minAge;

        $dateDepartCarbon = Carbon::parse($this->dateDepart);
        $dateRetourCarbon = Carbon::parse($this->dateRetour);

        $this->nbJrs = max(1, $dateRetourCarbon->diffInDays($dateDepartCarbon));

        $this->dateDepartDt = $dateDepartCarbon->format('d-m-Y H:i');
        $this->dateRetourDt = $dateRetourCarbon->format('d-m-Y H:i');

        if($voiture){
            $this->voiture = Car::where('slug',$voiture)->first();   }

        //Section protection et options
        if( session()->has('prtc_choisi')){
            $this->prtcChoisiId = session('prtc_choisi');   }
        if( session()->has('optnsIds')){
            $this->optnsIds = session('optnsIds');  }

        //Protection par défaut
        if($this->prtcChoisiId == null){
            $this->prtcChoisiId = Protection::where('type','=','Basique')->first()->id;
            session([ 'prtc_choisi'=>$this->prtcChoisiId ]);
        }
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

    public function choisirProtection( $p ){
        usleep(100000);
        $this->prtcChoisiId = $p;

        session([ 'prtc_choisi' =>   $this->prtcChoisiId ]);
    }

    public function AjouterOption( $o ){
        usleep(100000);
        $this->optnsIds[] = $o;
        $this->optnsIds = array_unique( $this->optnsIds );

        session([ 'optnsIds' => $this->optnsIds ]);
    }

    public function RetirerOption( $o ) {
        usleep(100000);
        $index = array_search($o, $this->optnsIds);
    
        if ($index !== false) {
            unset($this->optnsIds[$index]);
            $this->optnsIds = array_values($this->optnsIds);

            session(['optnsIds' => $this->optnsIds]);
        }
    }

    public function render(){

        //Protection
        $protections = Protection::all();
        $this->prtcChoisi = Protection::find( $this->prtcChoisiId );
        $this->prixPrtc = $this->prtcChoisi->prix * $this->nbJrs;

        //Options 
        $options = Option::all();
        if( $this->optnsIds != null ){
            $optnsChoisi = Option::whereIn('id',$this->optnsIds)->get();
            $this->prixOptns = 0;

            foreach( $optnsChoisi as $optnChoisi){
                $this->prixOptns += $optnChoisi->prix;  }
        }else{
            $optnsChoisi = null;
            $this->prixOptns = 0;
        }

        return view('livewire.choisir-options-et-franchise',[
            'protections' => $protections,
            'options' => $options,
            'protectionChoisi' => $this->prtcChoisi,
            'optnsIds' =>$this->optnsIds,
  
        ])->extends('layouts.client')->section('content');
    }
}
