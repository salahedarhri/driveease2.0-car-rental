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
        
        if (session()->has('dateDepart')) {
            $lieuDepart = session('lieuDepart');
            $lieuRetour = session('lieuRetour');
            $dateDepart = session('dateDepart');
            $dateRetour = session('dateRetour');
            $minAge = session('minAge');

        }else{
            $lieuDepart = $request->input('lieuDepart');
            $lieuRetour = $request->input('lieuRetour');
            $dateDepart = $request->input('dateDepart');
            $dateRetour = $request->input('dateRetour');
            $minAge = $request->input('minAge');
        }

    
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

        //store data in session via the global helper
        session([
            'lieuRetour' => $lieuRetour,
            'lieuDepart' => $lieuDepart,
            'dateDepart' => $dateDepart,
            'dateRetour' => $dateRetour,
            'dateDepartDt' => $dateDepartDt,
            'dateRetourDt' => $dateRetourDt,
            'nbJrs' => $nbJrs,
            'minAge' => $minAge,
        ]);
    
        return view('dispo', compact('voituresDisponibles','nbJrs','minAge', 
        'dateDepart', 'dateRetour', 
        'lieuDepart', 'lieuRetour',
        'dateDepartDt','dateRetourDt'));
    }

    public function choisirProtection(Request $request){

        //Retrieve data from session
        $dateDepart = session('dateDepart');
        $dateRetour = session('dateRetour');
        $dateDepartDt = session('dateDepartDt');
        $dateRetourDt = session('dateRetourDt');
        $lieuDepart = session('lieuDepart');
        $lieuRetour = session('lieuRetour');
        $nbJrs = session('nbJrs');
        $minAge = session('minAge');

        if($request->has('idVoiture')){ $voiture= Car::find($request->idVoiture);  }

        $protections = Protection::all();
        $options = Option::all();

        $protectionChoisi = Protection::where('type','=','Basique')->first();

        session([
            'voiture'=>$voiture,

        ]);
                
        return view('protection',compact('protectionChoisi','voiture','minAge','nbJrs','protections','options',
        'dateDepartDt','dateRetourDt',
        'dateDepart','dateRetour',
        'lieuDepart','lieuRetour'));
    }   

    public function actualiserFranchise(Request $request){

        $dateDepart = session('dateDepart');
        $dateRetour = session('dateRetour');
        $dateDepartDt = session('dateDepartDt');
        $dateRetourDt = session('dateRetourDt');
        $lieuDepart = session('lieuDepart');
        $lieuRetour = session('lieuRetour');
        $nbJrs = session('nbJrs');
        $minAge = session('minAge');
        $voiture = session('voiture');
        
        $protections = Protection::all();
        $options = Option::all();

        // Pour franchise, Chaque catégorie a une forme avec id
        if ($request->has('prtcChoisi')) {
            $prtc_choisi = $request->prtcChoisi;
        }
    
        $protectionChoisi = Protection::find($prtc_choisi);

        session([
            'protectionChoisi'=>$protectionChoisi,
        ]);
    
        return view('protection',compact('protectionChoisi', 'prtc_choisi','voiture','minAge','nbJrs','protections','options','voiture',
        'dateDepartDt','dateRetourDt',
        'dateDepart','dateRetour',
        'lieuDepart','lieuRetour'));
    }
    
    

}