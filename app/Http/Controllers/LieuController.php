<?php

namespace App\Http\Controllers;
use App\Models\Lieu;
use Illuminate\Http\Request;

class LieuController extends Controller
{
       public function getSuggestions(Request $request){
        $query = $request->input('query');

        $suggestions = Lieu::where('nom', 'like', "%$query%")->limit(5)->pluck('nom');

        return response()->json($suggestions);}
}
