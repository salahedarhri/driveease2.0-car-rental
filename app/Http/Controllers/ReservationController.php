<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function CheckDisponibilite(Request $request){

        $typeVehicule = $request->input('typeVehicule');
        $lieuDepart = $request->input('lieuDepart');
        $lieuRetour = $request->input('lieuRetour');
        $heureDepart = $request->input('heureDepart');
        $heureRetour = $request->input('heureRetour');
    }
}
