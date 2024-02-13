<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Lieu;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ReservationController;

class TrouverVoituresDispo extends Component {

    public $minAge = 26;
    public $lieuDepart;
    public $lieuRetour;
    public $dateDepart;
    public $dateRetour;
    public $lieux_D_R = [] ;
    public $indicDepart = null;
    public $indicRetour = null;
    public $suggestionsDepart = [];
    public $suggestionsRetour = [];

    public function mount()
    {
        $this->lieux_D_R = Lieu::pluck('nom')->toArray();
    }

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
            'after_or_equal' => 'La date de retour doit être postérieure ou égale à la date de départ.',
            'dateDepart.after_or_equal' => 'La date de départ doit être au moins un jour après la date actuelle.',
        ];

    public function chercherLieu( $lieu, $suggestions ){

        $suggestions = [];

        if( $lieu!=null && strlen($lieu) >= 3){
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
    public function validerDonnees(){

        $this->validate($this->rules, $this->message );

        if( !in_array($this->lieuDepart,$this->lieux_D_R)){
            return $this->addError('lieuDepart','Veuillez sélectionner une de nos suggestions, On couvre les villes suivantes: Agadir, Marrakech & Casablanca');
        }

        if( !in_array($this->lieuRetour,$this->lieux_D_R)){
            return $this->addError('lieuRetour','Veuillez sélectionner une de nos suggestions, On couvre les villes suivantes: Agadir, Marrakech & Casablanca');
        }
        
        session([
            'lieuRetour' => $this->lieuRetour,
            'lieuDepart' => $this->lieuDepart,
            'dateDepart' => $this->dateDepart,
            'dateRetour' => $this->dateRetour,
            'minAge' => $this->minAge,
        ]);

        return redirect()->action([ ReservationController::class,'CheckDisponibilite']);
    }
    
    public function render(){
        $suggestionsDepart = [];
        $suggestionsRetour = [];

        if( $this->indicDepart != null ){
            $lieuDepSelect = Lieu::find( $this->indicDepart);
            $nomLieuDepSelect = $lieuDepSelect->nom;    }

        if($this->indicDepart == null || $this->lieuDepart != $nomLieuDepSelect ){
            $suggestionsDepart = $this->chercherLieu($this->lieuDepart, $suggestionsDepart);    }
            
        if( $this->indicRetour != null ){
            $lieuRetSelect = Lieu::find( $this->indicRetour);
            $nomLieuRetSelect = $lieuRetSelect->nom;    }

        if($this->indicRetour == null || $this->lieuRetour != $nomLieuRetSelect ){
            $suggestionsRetour = $this->chercherLieu($this->lieuRetour, $suggestionsRetour);    }

        return view('livewire.form-accueil',[
            'lieuxDepart' => $suggestionsDepart,
            'lieuxRetour' => $suggestionsRetour,
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
