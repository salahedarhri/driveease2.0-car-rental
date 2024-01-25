@extends('layouts.client')

@section('content')

@include('composants.formulaireRecap')

<div class="w-full bg-slate-200 px-4">

  <div class="max-w-5xl mx-auto py-2 font-cabin">

    <p class="font-montserrat text-2xl max-sm:text-2xl text-darkBlue font-bold px-3 py-5">Choisissez votre véhicule</p>

    @if ($voituresDisponibles->isEmpty())
        <p>Aucune voiture disponible pour les critères spécifiés.</p>
    @else

        @foreach ($voituresDisponibles as $car)
        
            <div x-data="{ open: false }">

              <!-- Informations de Voiture   -->
              <div class="bg-white overflow-hidden flex flex-col sm:flex-row px-2 border-b-2">

                <div class="sm:w-1/3 py-3 flex items-center justify-center">
                  <img src="{{ asset('images/voitures/'.$car->photo)}}" alt="Car Image" class="h-56 w-auto object-center object-contain p-3">
                </div>
                
                <div class="sm:w-1/3 px-2 sm:py-4">
                  <h2 class="text-xl font-semibold font-montserrat">{{ $car->modele }}</h2>

                  <p class="text-slate-600 py-2"> {{ $car->description }} </p>

                  <button @click="open =! open" 
                          class="px-2 py-1 mt-3 rounded-md font-semibold font-montserrat text-teal-500">
                    Plus de détails &nbsp; &#11033</button>

                </div>
                <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
                  <div class="text-right font-montserrat">

                    <p class="text-xl max-sm:text-lg text-mediumBlue"><b>{{ $car->prix}} DH</b>/Jour</p>
                    <p class="text-md max-sm:text-sm text-lightBlue pb-4 max-sm:pb-2">Total {{ $car->prix * $nbJrs }} DH</p>
                    
                    <form action="{{ route('franchise')}}" method="post">
                      @csrf
                      <input type="hidden" name="idVoiture" value="{{ $car->id }}">
                      <input type="submit" value="Sélectionner"
                      class="font-semibold py-2 px-4 rounded-full bg-lightBlue hover:bg-teal-500 transition mt-4 w-36 max-sm:w-full text-white">
                    </form>
                    
                    </a>
                  </div>
                </div>
              </div>
              
              <!-- Garantie + Details de la voiture -->
              <div x-show="open" 
                @click.outside="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="rounded-b-lg">

                  <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-2 justify-evenly p-4">

                    <div class="flex flex-col p-4 bg-slate-100 rounded">
                      <p class="font-bold text-lg pb-1">Détails de la Voiture </p>
                      <div class="flex flex-col p-2">
                        <p><b class="text-teal-500 mr-2">&#11047;</b> {{ $car->nbPers }} Personnes</p>
                        <p><b class="text-teal-500 mr-2">&#11047;</b> Transmission {{ $car->transmission }}</p>
                        @if( $car->climatisation == true )
                          <p><b class="text-teal-500 mr-2">&#11047;</b>Climatisation</p>
                        @endif
                        <p><b class="text-teal-500 mr-2">&#11047;</b> {{ $car->minAge }} ans min.</p>

                        
                      </div>
                    </div>

                    <div class="flex flex-col p-3 bg-slate-100">
                      <p class="font-bold text-lg pb-1">Protection Basique <i class="text-sm text-teal-600">&nbsp; inclus</i></p>
                      <p> <i class="text-lg text-teal-500 mr-2">&#x2713;</i> Protection contre le vol</p>
                      <p> <i class="text-lg text-teal-500 mr-2">&#x2713;</i> Protection contre les dommages résultant d'une collision</p>

                    </div>

                  </div>

              </div>

            </div>
        @endforeach
    @endif

  </div>

</div>

@endsection