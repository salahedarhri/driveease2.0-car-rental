<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Car;
use App\Models\Lieu;
use App\Models\Protection;
use App\Models\Option;

class ChoisirOptionsEtFranchise extends Component{

    public $dateDepart, $dateRetour ;
    public $dateDepartDt, $dateRetourDt;
    public $lieuDepart, $lieuRetour;
    public $nbJrs, $minAge, $voiture;

    //Tous les Protections et Options
    public $protections,$options;

    // Protection et Option Choisi
    public $prtcChoisi, $prixPrtc;
    public $prtcChoisiId = null;
    public $prixOptns;
    public $optnsIds = []; 

    public function mount (Request $request){

        $this->protections = Protection::all();
        $this->options = Option::all();

        //Informations pour récapitulatif
        $this->dateDepart = session('dateDepart');
        $this->dateRetour = session('dateRetour');
        $this->dateDepartDt = session('dateDepartDt');
        $this->dateRetourDt = session('dateRetourDt');
        $this->lieuDepart = session('lieuDepart');
        $this->lieuRetour = session('lieuRetour');
        $this->nbJrs = session('nbJrs');
        $this->minAge = session('minAge');
        $this->prtcChoisiId = session('prtc_choisi');

        if($request->has('idVoiture')){
            $this->voiture = Car::find($request->idVoiture);
            session(['idVoiture' =>$request->idVoiture]);
            
        }elseif( session()->has('idVoiture') ){
            $idVoiture = session('idVoiture');
            $this->voiture = Car::find($idVoiture);
        }

        if( session()->has('prtc_choisi')){
            $this->prtcChoisiId = session('prtc_choisi');
        }
        if( session()->has('optnsIds')){
            $this->optnsIds = session('optnsIds');
        }

        //Protection par défaut
        if($this->prtcChoisiId == null){
            $this->prtcChoisiId = Protection::where('type','=','Basique')->first()->id;
            session([ 'prtc_choisi'=>$this->prtcChoisiId ]);
        }
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
        $this->prtcChoisi = Protection::find( $this->prtcChoisiId );
        $this->prixPrtc = $this->prtcChoisi->prix * $this->nbJrs;

        //Options 
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
            'protections' => $this->protections,
            'options' => $this->options,
            'protectionChoisi' => $this->prtcChoisi,
            'optnsIds' =>$this->optnsIds,
  
        ]);
    }
}
