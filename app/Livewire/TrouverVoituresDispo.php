<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Lieu;
use App\Models\Car;
use Illuminate\Http\Request;

class TrouverVoituresDispo extends Component {

    public $minAge;
    public $lieuDepart, $lieuRetour;
    public $dateDepart, $dateRetour;
    public $voituresDisponibles;
    public $nbJrs;

    protected $rules = [
        'minAge' => 'required',
        'lieuDepart' => 'required',
        'lieuRetour' => 'required',
        'dateDepart' => 'required|date|after_or_equal',
        'dateRetour' => 'required|date|after:dateDepart',
    ];

    public function updatedDateDepart($value)
    {
        $this->validateOnly($value);
    }

    public function updatedDateRetour($value)
    {
        $this->validateOnly($value);
    }

    public function mount()
    {
        $this->dateDepart = Carbon::now()->addDay()->toDateString();
    }

    public function CheckDisponibilite(Request $request)
    {
        $this->validate();

        $depart = Lieu::where('nom', 'like', '%' . $this->lieuDepart . '%')->first();

        if ($depart == null) {
            session()->flash('depart', 'Veuillez choisir parmi nos suggestions, les villes concernées : Marrakech, Agadir et Casablanca');
            return;
        }

        $this->voituresDisponibles = Car::where('ville', '=', $depart->ville)
            ->where('minAge', '<=', $this->minAge)
            ->whereDoesntHave('reservations', function ($query) {
                $query->where('dateDepart', '<=', $this->dateRetour)
                    ->where('dateRetour', '>=', $this->dateDepart);
            })
            ->orderBy('prix', 'asc')
            ->get();

        $this->dateDepart = Carbon::parse($this->dateDepart);
        $this->dateRetour = Carbon::parse($this->dateRetour);

        $this->nbJrs = $this->dateRetour->diffInDays($this->dateDepart);

        session([
            'lieuRetour' => $this->lieuRetour,
            'lieuDepart' => $this->lieuDepart,
            'dateDepart' => $this->dateDepart,
            'dateRetour' => $this->dateRetour,
            'dateDepartDt' => $this->dateDepart->format('d-m-Y H:i'),
            'dateRetourDt' => $this->dateRetour->format('d-m-Y H:i'),
            'nbJrs' => $this->nbJrs,
            'minAge' => $this->minAge,
        ]);

        session()->forget('optnIdArray');
        session()->forget('prtc_choisi');
    }

    
    public function render()
    {
        return view('livewire.trouver-voitures-dispo');
    }
}
