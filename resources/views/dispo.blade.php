@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 pt-4">

  @include('composants.formulaireRecap')

  <div class=" max-w-5xl mx-auto p-4 ">

    @if ($voituresDisponibles->isEmpty())
        <p>Aucune voiture disponible pour les critères spécifiés.</p>
    @else

        @foreach ($voituresDisponibles as $car)
            <div x-data="{ open: false }">

              <!-- Informations de Voiture   -->
              <div class="bg-white overflow-hidden flex flex-col sm:flex-row px-2 border-b-2">
                <div class="sm:w-1/3 py-3 flex items-center justify-center">
                  <img src="{{ asset('images/voitures/'.$car->photo)}}" alt="Car Image" class="h-auto w-full p-3">
                </div>
                <div class="sm:w-1/3 px-2 py-4">
                  <h2 class="text-xl font-semibold">{{ $car->modele }}</h2>

                  <button @click="open =! open" 
                  class="px-2 py-1 mt-3 rounded-md font-semibold text-emerald-500">
                  Plus de détails &#11033</button>

                </div>
                <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
                  <div class="text-right">
                    <p class="text-xl max-sm:text-lg font-semibold text-mediumBlue">{{ $car->prix}} Dh/Jour</p>
                    
                    <form action="{{ route('protection')}}" method="post">
                      @csrf
                      <input type="hidden" name="dateDepart" value="{{ $dateDepart }}">
                      <input type="hidden" name="dateRetour" value="{{ $dateRetour }}">
                      <input type="hidden" name="lieuDepart" value="{{ $lieuDepart }}">
                      <input type="hidden" name="lieuRetour" value="{{ $lieuRetour }}">
                      <input type="hidden" name="idVoiture" value="{{ $car->id }}">
                      <input type="submit" value="Sélectionner"
                      class="font-semibold py-2 px-4 rounded-full bg-lightBlue mt-4 w-36 max-sm:w-full">
                    </form>
                    
                    </a>
                  </div>
                </div>
              </div>
              
              <!-- Garantie + Details de la voiture -->
              <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-300"x-transition:enter-start="opacity-0 transform scale-95"x-transition:enter-end="opacity-100 transform scale-100"class="rounded-b-lg">

                  <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-2 justify-evenly p-4">

                    <div class="flex flex-col p-4 bg-slate-100 rounded">
                      <p class="font-bold text-lg pb-1">Détails de la Voiture </p>
                      <div class="flex flex-col p-2">
                        <p>Nbre Personnes : {{ $car->nbPers }}</p>
                        <p>Transmission : {{ $car->transmission }}</p>
                        <p>Climatisation : @if( isset( $car->climatisation)){{'Oui'}} @else {{'Non'}}@endif</p>
                        <p class="text-gray-700"> {{ $car->description }} </p>
                      </div>
                    </div>

                    <div class="flex flex-col p-3 bg-slate-100">
                      <p class="font-bold text-lg pb-1">Protection Basique <i class="text-sm text-teal-600">&nbsp; inclus</i></p>
                      <p> <i class="text-lg text-teal-600 mr-2">&#x2713;</i> Protection contre le vol</p>
                      <p> <i class="text-lg text-teal-600 mr-2">&#x2713;</i> Protection contre les dommages résultant d'une collision</p>

                    </div>

                  </div>

              </div>
            </div>
        @endforeach
    @endif

  </div>

</div>

@endsection