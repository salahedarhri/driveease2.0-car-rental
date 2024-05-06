<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Carbon\Carbon;


class VoituresDisponibles extends Component
{
    public $dateDepart;
    public $dateRetour;
    public $lieuDepart;
    public $lieuRetour;
    public $minAge;
    public $nbJrs;
    public $dateDepartDt;
    public $dateRetourDt;
    public $nbArticles = 12;

    public function mount($dateDepart, $dateRetour, $lieuDepart, $lieuRetour, $minAge){
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
    }

    public function ChargerPlus(){
        $this->nbArticles += 12;
    }

    public function render()
    {
        $voitures = Car::where('minAge', '<=', $this->minAge)
        ->whereDoesntHave('reservations', function ($query) {
            $query->where('dateDepart', '<=', $this->dateRetour)
                ->where('dateRetour', '>=', $this->dateDepart);
                })
                ->orderBy('prix', 'asc')
                ->take($this->nbArticles)
                ->get();

        return view('livewire.voitures-disponibles',[
            'voituresDisponibles' => $voitures,
        ])->extends('layouts.client')->section('content');
    }
}
