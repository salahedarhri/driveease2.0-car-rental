@extends('layouts.client')

@section('content')

<div class="flex flex-col items-center p-2 my-5 mx-auto text-lg max-w-xl bg-emerald-100 border border-emerald-500">
  <p>Lieu de départ : {{ $lieuDepart }}</p>
  <p>Lieu de retour : {{ $lieuRetour }}</p>
  <p>Date et heure de départ : {{ $dateDepartDt }}</p>
  <p>Date et heure de retour : {{ $dateRetourDt }}</p>
</div>

<div class="container mx-auto p-4 max-w-5xl">

  @if ($voituresDisponibles->isEmpty())
    <p>Aucune voiture disponible pour les critères spécifiés.</p>
  @else

    @foreach ($voituresDisponibles as $car)
    
    <div x-data="{ open: false }">

      <!-- Car display -->
      <div class="bg-white rounded-t-lg shadow-lg overflow-hidden flex flex-col sm:flex-row p-2 border-b-2">
        <div class="sm:w-1/3 py-4">
          <img src="{{ asset('images/voitures/'.$car->photo)}}" alt="Car Image" class="h-auto w-full p-2">
        </div>
        <div class="sm:w-1/3 px-2 py-4">
          <h2 class="text-2xl font-semibold">{{ $car->modele }}</h2>
          <p class="text-gray-700"> {{ $car->description }} </p>
          <button @click="open = ! open"
           class="px-4 py-2 my-3 bg-mediumBlue rounded-md font-semibold max-sm:w-full text-whiteBlue">Plus de détails ></button>
        </div>
        <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
          <div class="text-right">
            <!-- Total display for later : <p class="text-lg font-semibold mt-4">Total: $132</p> -->
            <p class="text-2xl font-semibold text-mediumBlue">{{ $car->prix}} Dh/Jour</p>
            <button class="font-semibold py-2 px-4 rounded-full bg-lightBlue mt-4 w-36 max-sm:w-full">Sélectionner</button>
          </div>
        </div>
      </div>

      <!-- Car details + gaurantee display -->
      <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
           class="bg-lightBlue h-48">

      </div>
    </div>
    @endforeach

</div>
  @endif

@endsection