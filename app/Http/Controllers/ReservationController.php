<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Protection;
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
                      ->where('dateRetour', '>=', $dateDepart);
      
            })
            ->get();

        //formatter date pour affichage & manip.
        $dateDepart = Carbon::parse($dateDepart);
        $dateRetour = Carbon::parse($dateRetour);

        $nbJrs = $dateRetour->diffInDays($dateDepart);

        $dateDepartDt = $dateDepart->format('d-m-Y H:i');
        $dateRetourDt = $dateRetour->format('d-m-Y H:i');
    
        return view('dispo', compact('voituresDisponibles', 'dateDepart', 'dateRetour', 'lieuDepart', 'lieuRetour','dateDepartDt','dateRetourDt','nbJrs'));
    }

    public function choisirProtection(Request $request){

        if($request->has('dateDepart')){ $dateDepartDt = $request->dateDepart; }
        if($request->has('dateRetour')){ $dateRetourDt = $request->dateRetour; }
        if($request->has('lieuDepart')){ $lieuDepart = $request->lieuDepart; }
        if($request->has('lieuRetour')){ $lieuRetour = $request->lieuRetour; }
        if($request->has('nbJrs')){ $nbJrs = $request->nbJrs; }

        if($request->has('idVoiture')){ $voiture= Car::find($request->idVoiture);  }

        $protection = Protection::where('type','=','Basique')->first();

        $protection_display = Protection::all();

        dd($protection_display);
                
        return view('protection',compact('dateDepartDt','dateRetourDt','lieuDepart','lieuRetour','voiture','nbJrs','protection','protection_display'));
    }   

    

}