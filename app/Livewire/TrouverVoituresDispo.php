<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Lieu;
use App\Http\Controllers\ReservationController;

class TrouverVoituresDispo extends Component {

    public $minAge = 26;
    public $lieuDepart;
    public $lieuRetour;
    public $dateDepart;
    public $dateRetour;
    public $indicDepart;
    public $indicRetour;
    public $suggestionsDepart;
    public $suggestionsRetour;
    public $lieux_All;


    protected $rules = [
            'lieuDepart' => 'required',
            'lieuRetour' => 'required',
            'dateDepart' => 'required|date|after_or_equal:now',
            'dateRetour' => 'required|date|after:dateDepart',
            'minAge' => 'required|digits:2',
        ];

    protected $message = [
            'required' => 'Ce champ est obligatoire.',
            'date' => 'La date doit être une date et heure valide.',
            'after_or_equal:now' => 'La date de retour doit être postérieure ou égale à la date de départ.',
            'dateDepart.after_or_equal:now' => 'La date de départ doit être au moins un jour après la date actuelle.',
        ];

    public function mount(){
        $this->lieux_All = Lieu::pluck('nom')->toArray();
    }

    public function updatedLieuDepart(){
        $this->suggestionsDepart = [];

        if(strlen($this->lieuDepart) >= 3){
            $this->suggestionsDepart = Lieu::where('ville','like','%'.$this->lieuDepart.'%')
                                ->orWhere('nom', 'LIKE', '%'.$this->lieuDepart.'%')
                                ->limit(10)
                                ->get();
        }
        $this->indicDepart = count($this->suggestionsDepart) === 0;
    }

    
    public function updatedLieuRetour(){
        $this->suggestionsRetour = [];

        if(strlen($this->lieuRetour) >= 3){
            $this->suggestionsRetour = Lieu::where('ville','like','%'.$this->lieuRetour.'%')
                                ->orWhere('nom', 'LIKE', '%'.$this->lieuRetour.'%')
                                ->limit(10)
                                ->get();
        }
        $this->indicRetour = count($this->suggestionsRetour) === 0;
    }

    public function appliquerLieuDepart( $lieu){
        $this->suggestionsDepart = [];
        $this->lieuDepart = $lieu;    
    }
    public function appliquerLieuRetour( $lieu){
        $this->suggestionsRetour= [];
        $this->lieuRetour = $lieu;    
    }
    public function validerDonnees(){

        $this->validate($this->rules, $this->message );

        if( !in_array($this->lieuDepart,$this->lieux_All)){
            return $this->addError('lieuDepart','Veuillez sélectionner une de nos suggestions, On couvre les villes suivantes: Agadir, Marrakech & Casablanca');
        }

        if( !in_array($this->lieuRetour,$this->lieux_All)){
            return $this->addError('lieuRetour','Veuillez sélectionner une de nos suggestions, On couvre les villes suivantes: Agadir, Marrakech & Casablanca');
        }

        return redirect()->route('VoituresDisponibles',[
            'dateDepart'=> $this->dateDepart,
            'dateRetour'=> $this->dateRetour,
            'lieuDepart'=> $this->lieuDepart,
            'lieuRetour'=> $this->lieuRetour,
            'minAge'=> $this->minAge,
        ]);
    }
    
    public function render(){
        
        return view('livewire.form-accueil',[
            'lieuxDepart' => $this->suggestionsDepart,
            'lieuxRetour' => $this->suggestionsRetour,
        ]);
    }
}

































    // protected $rules = [
    //     'minAge' => 'required',
    //     'lieuDepart' => 'required',
    //     'lieuRetour' => 'required',
    //     'dateDepart' => ['required','date',"after_or_equal:{ $minDateDepart }"],
    //     'dateRetour' => 'required|date|after:dateDepart',
    // ];

    // public function updatedDateDepart($value){
    //     $this->validateOnly($value);
    // }

    // public function updatedDateRetour($value){
    //     $this->validateOnly($value);
    // }

    // public function verifierDonnees(Request $request){

    //     $minDateDepart = Carbon::now()->addDay()->toDateString();

    //     $this->validate($request, [
    //         'minAge' => 'required',
    //         'lieuDepart' => 'required',
    //         'lieuRetour' => 'required',
    //         'dateDepart' => ['required','date', "after_or_equal:{$minDateDepart}"],
    //         'dateRetour' => 'required|date|after:dateDepart',
    //     ]);

    //     $depart = Lieu::where('nom', 'like', '%' . $this->lieuDepart . '%')
    //                 ->first();

    //     if ($depart == null) {
    //         session()->flash('depart', 'Veuillez choisir parmi nos suggestions, les villes concernées : Marrakech, Agadir et Casablanca');
    //         return; }

    //     $this->voituresDisponibles = Car::where('ville', '=', $depart->ville)
    //         ->where('minAge', '<=', $this->minAge)
    //         ->whereDoesntHave('reservations', function ($query) {
    //             $query->where('dateDepart', '<=', $this->dateRetour)
    //                 ->where('dateRetour', '>=', $this->dateDepart);
    //         })
    //         ->orderBy('prix', 'asc')
    //         ->get();

    //     $this->dateDepart = Carbon::parse($this->dateDepart);
    //     $this->dateRetour = Carbon::parse($this->dateRetour);

    //     $this->nbJrs = $this->dateRetour->diffInDays($this->dateDepart);

    //     session([
    //         'lieuRetour' => $this->lieuRetour,
    //         'lieuDepart' => $this->lieuDepart,
    //         'dateDepart' => $this->dateDepart,
    //         'dateRetour' => $this->dateRetour,
    //         'dateDepartDt' => $this->dateDepart->format('d-m-Y H:i'),
    //         'dateRetourDt' => $this->dateRetour->format('d-m-Y H:i'),
    //         'nbJrs' => $this->nbJrs,
    //         'minAge' => $this->minAge,
    //     ]);

    //     session()->forget('optnIdArray');
    //     session()->forget('prtc_choisi');

    //     return view('livewire.voitures-disponibles');
    // }
