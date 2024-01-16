<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Protection;
use App\Models\Option;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function CheckDisponibilite(Request $request) {

        $minDateDepart = Carbon::now()->addDay()->toDateString();

        $message = [
            'required' => 'Ce champ est obligatoire.',
            'date' => 'La date doit être une date et heure valide.',
            'after_or_equal' => 'La date de retour doit être postérieure ou égale à la date de départ.',
            'dateDepart.after_or_equal' => 'La date de départ doit être au moins un jour après la date actuelle.',
        ];
        $conditions = $request->validate([
            'minAge' => 'required',
            'lieuDepart' => 'required',
            'lieuRetour' => 'required',
            'dateDepart' => ['required', 'date', "after_or_equal:{$minDateDepart}"],
            'dateRetour' => ['required', 'date', "after:dateDepart"],
        ], $message);
        
        $lieuDepart = $request->input('lieuDepart');
        $lieuRetour = $request->input('lieuRetour');
        $dateDepart = $request->input('dateDepart');
        $dateRetour = $request->input('dateRetour');
        $minAge = $request->input('minAge');
    
        $voituresDisponibles = Car::where('ville', '=', $lieuDepart)
            ->where('minAge','<=',$minAge)
            ->whereDoesntHave('reservations', function ($query) use ($dateDepart, $dateRetour) {
                $query->where('dateDepart', '<=', $dateRetour)
                      ->where('dateRetour', '>=', $dateDepart);})
            ->orderBy('prix','asc')
            ->get();

        //Formatter date pour affichage & manip.
        $dateDepart = Carbon::parse($dateDepart);
        $dateRetour = Carbon::parse($dateRetour);

        $nbJrs = $dateRetour->diffInDays($dateDepart);

        //Date pour affichage
        $dateDepartDt = $dateDepart->format('d-m-Y H:i');
        $dateRetourDt = $dateRetour->format('d-m-Y H:i');
    
        return view('dispo', compact('voituresDisponibles', 'dateDepart', 'dateRetour', 'lieuDepart', 'lieuRetour','dateDepartDt','dateRetourDt','nbJrs','minAge'));
    }

    public function choisirProtection(Request $request){

        //Date for Controller
        if($request->has('dateDepart')){ $dateDepart = $request->dateDepart; }
        if($request->has('dateRetour')){ $dateRetour = $request->dateRetour; }

        //Date for View
        if($request->has('dateDepartDt')){ $dateDepartDt = $request->dateDepartDt; }
        if($request->has('dateRetourDt')){ $dateRetourDt = $request->dateRetourDt; }

        //Rest of Informations 
        if($request->has('lieuDepart')){ $lieuDepart = $request->lieuDepart; }
        if($request->has('lieuRetour')){ $lieuRetour = $request->lieuRetour; }
        if($request->has('nbJrs')){ $nbJrs = $request->nbJrs; }
        if($request->has('minAge')){ $minAge = $request->minAge; }
        if($request->has('idVoiture')){ $voiture= Car::find($request->idVoiture);  }

        //Pour séléctionner la protection basique par défaut :
        // $protection = Protection::where('type','=','Basique')->first();

        $protections = Protection::all();
        $options = Option::all();
                
        return view('protection',compact('dateDepartDt','dateRetourDt','dateDepart','dateRetour','lieuDepart','lieuRetour','voiture','minAge','nbJrs','protections','options'));
    }   

    

}