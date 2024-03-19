<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Protection;
use App\Models\Option;

use App\Models\Conducteur;
use App\Models\Reservation;
use Carbon\Carbon;


class ReservationController extends Controller{
    
    public function CheckDisponibilite(Request $request) {
        
        $dateDepart = session('dateDepart');
        $dateRetour = session('dateRetour');
        $lieuDepart = session('lieuDepart');
        $lieuRetour = session('lieuRetour');
        $minAge = session('minAge');

        $voituresDisponibles = Car::where('minAge','<=',$minAge)
                                ->whereDoesntHave('reservations', function ($query) use ($dateDepart, $dateRetour) {
                                    $query->where('dateDepart', '<=', $dateRetour)
                                        ->where('dateRetour', '>=', $dateDepart);})
                                ->orderBy('prix','asc')
                                ->get();

        //Formatter date pour affichage & manip.
        // Carbon::setLocale(config('app.locale'));
        $dateDepart = Carbon::parse($dateDepart);
        $dateRetour = Carbon::parse($dateRetour);

        $nbJrs = max(1, $dateRetour->diffInDays($dateDepart));

        //Date pour affichage
        $dateDepartDt = $dateDepart->format('d-m-Y H:i');
        $dateRetourDt = $dateRetour->format('d-m-Y H:i');

        //store data in session
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

        //clean session from previous use
        session()->forget('optnsIds');
        session()->forget('prtc_choisi');
    
        return view('dispo', compact('voituresDisponibles','nbJrs','minAge', 
        'dateDepart', 'dateRetour', 
        'lieuDepart', 'lieuRetour',
        'dateDepartDt','dateRetourDt'));
    }

    public function choisirProtection(Request $request){

        $dateDepart = session('dateDepart');
        $dateRetour = session('dateRetour');
        $dateDepartDt = session('dateDepartDt');
        $dateRetourDt = session('dateRetourDt');
        $lieuDepart = session('lieuDepart');
        $lieuRetour = session('lieuRetour');
        $nbJrs = session('nbJrs');
        $minAge = session('minAge');

        if($request->has('idVoiture')){
             $voiture= Car::find($request->idVoiture);
             session([ 'idVoiture'=>$request->idVoiture ]);
        }

        if( session()->has('idVoiture') ){
            $idVoiture = session('idVoiture');
            $voiture = Car::find($idVoiture);
        }

        if( session()->has('optnsIds')){
            $optnsIds = session('optnsIds');
        }else{
            $optnsIds = null;
        }

        $protections = Protection::all();
        $options = Option::all();
 
        if( session()->has('prtc_choisi')){
            $prtcChoisiId = session('prtc_choisi');
            $protectionChoisi = Protection::find($prtcChoisiId);
            $prix_prtc = $protectionChoisi->prix * $nbJrs;
        }else{
            $protectionChoisi = Protection::where('type','=','Basique')->first();
            $prtc_choisi = $protectionChoisi->id;
            $prix_prtc = $protectionChoisi->prix * $nbJrs;

            session([ 'prtc_choisi'=>$prtc_choisi ]);
        }


                
        return view('prtc-et-optns',compact('prix_prtc','protectionChoisi','voiture','minAge','nbJrs',
        'protections','options','optnsIds',
        'dateDepartDt','dateRetourDt',
        'dateDepart','dateRetour',
        'lieuDepart','lieuRetour'));
    }   

    public function renduEmail(){
        $reservationId = session('reservation');

        $reservation = Reservation::find( $reservationId );
        $conducteur = Conducteur::find( $reservation->idConducteur );
        $voiture = Car::find($reservation->idCar);

        return view('emails.emailReservation',[
            'conducteur' => $conducteur,
            'reservation' => $reservation,
        ]);
    }

    // public function actualiserFranchise(Request $request){

    //     $dateDepart = session('dateDepart');    $dateRetour = session('dateRetour');
    //     $dateDepartDt = session('dateDepartDt');    $dateRetourDt = session('dateRetourDt');
    //     $lieuDepart = session('lieuDepart');    $lieuRetour = session('lieuRetour');
    //     $nbJrs = session('nbJrs');
    //     $minAge = session('minAge');
    //     $voiture = session('voiture');
    //     $optnIdArray = session('optnIdArray');
        
    //     $protections = Protection::all();
    //     $options = Option::all();

    //     //Protection par défaut /Protection sélecionnée :
    //     if ($request->has('prtcChoisi')) {
    //         $prtc_choisi = $request->prtcChoisi; 
    //     }else{  $prtc_choisi = 1;  }
    
    //     $protectionChoisi = Protection::find($prtc_choisi);

    //     $prix_prtc = $protectionChoisi->prix * $nbJrs;

    //     session([ 'prtc_choisi'=>$prtc_choisi ]);


    //     //Calculer prix options
    //     if( $optnIdArray !== null ){

    //         $optnsChoisi = Option::whereIn('id',$optnIdArray)->get();
    //         $prix_optns = 0;

    //         foreach( $optnsChoisi as $optnChoisi){  $prix_optns += $optnChoisi->prix;   }

    //     }else{  $optnsChoisi = null;    $prix_optns = 0;     }

    //     return view('protection2',compact('prix_prtc','prix_optns','optnIdArray','protectionChoisi','voiture','minAge','nbJrs','protections','options',
    //     'dateDepartDt','dateRetourDt',
    //     'dateDepart','dateRetour',
    //     'lieuDepart','lieuRetour'));
    // }

    // public function choisirOptions( Request $request){

    //     //Data from Session
    //     $dateDepart = session('dateDepart');
    //     $dateRetour = session('dateRetour');
    //     $dateDepartDt = session('dateDepartDt');
    //     $dateRetourDt = session('dateRetourDt');
    //     $lieuDepart = session('lieuDepart');
    //     $lieuRetour = session('lieuRetour');
    //     $nbJrs = session('nbJrs');
    //     $minAge = session('minAge');
    //     $voiture = session('voiture');
    //     $prtc_choisi = session('prtc_choisi');

    //     //Objects from database
    //     $protections = Protection::all();
    //     $options = Option::all();

    //     //Résumer la protection déja choisie ou celle par défaut
    //     $protectionChoisi = Protection::find($prtc_choisi);
    //     $prix_prtc = $protectionChoisi->prix * $nbJrs;

    //     //Setting up options data for storage and display
    //     $optnIdArray = session('optnIdArray', []);
    //     $optnIdSelectionne = $request->input('optionId');

    //     if( empty($optnIdArray)){
    //         $optnIdArray = [ $optnIdSelectionne ];
    //     }else{
    //         $optnIdArray[] = $optnIdSelectionne;
    //         $optnIdArray = array_unique($optnIdArray);
    //     }

    //     session(['optnIdArray' => $optnIdArray]);
        
    //     //Calculer prix options
    //     if( $optnIdArray !== null ){

    //         $optnsChoisi = Option::whereIn('id',$optnIdArray)->get();
    //         $prix_optns = 0;

    //         foreach( $optnsChoisi as $optnChoisi){  $prix_optns += $optnChoisi->prix;   }

    //     }else{  $optnsChoisi = null;    $prix_optns = 0;  }
                
    //     return view('protection',compact('prix_prtc','prix_optns','optnIdArray','protectionChoisi','voiture','minAge','nbJrs','protections','options',
    //     'dateDepartDt','dateRetourDt',
    //     'dateDepart','dateRetour',
    //     'lieuDepart','lieuRetour'));

    // }

    // public function retirerOption( Request $request){

    //     //Data from session & request
    //     $dateDepart = session('dateDepart');    $dateRetour = session('dateRetour');
    //     $dateDepartDt = session('dateDepartDt');    $dateRetourDt = session('dateRetourDt');
    //     $lieuDepart = session('lieuDepart');    $lieuRetour = session('lieuRetour');
    //     $nbJrs = session('nbJrs');
    //     $minAge = session('minAge');
    //     $voiture = session('voiture');
    //     $prtc_choisi = session('prtc_choisi');
    //     $optnIdArray = session('optnIdArray', []);
    //     $optnIdSup = $request->input('optionIdSup');

    //     //Objects from database
    //     $protections = Protection::all();
    //     $options = Option::all();

    //     //Résumer Protection choisie ou par défaut
    //     $protectionChoisi = Protection::find($prtc_choisi);
    //     $prix_prtc = $protectionChoisi->prix * $nbJrs;

    //     //Retirer l'option du groupe sélectionnée
    //     $indexIdSup = array_search($optnIdSup, $optnIdArray);
    //     if ( $indexIdSup !== false ){
    //         unset($optnIdArray[ $indexIdSup ]);
    //         $optnIdArray = array_unique($optnIdArray);
    //     }

    //     session(['optnIdArray' => $optnIdArray]);

    //     //Calculer prix options
    //     if( $optnIdArray !== null ){

    //         $optnsChoisi = Option::whereIn('id',$optnIdArray)->get();
    //         $prix_optns = 0;

    //         foreach( $optnsChoisi as $optnChoisi){  $prix_optns += $optnChoisi->prix; }

    //     }else{  $optnsChoisi = null;     $prix_optns = 0;  }

                 
    //     return view('protection',compact('prix_prtc','prix_optns','optnIdArray','protectionChoisi','voiture','minAge','nbJrs','protections','options',
    //     'dateDepartDt','dateRetourDt',
    //     'dateDepart','dateRetour',
    //     'lieuDepart','lieuRetour'));

    // }
    
}