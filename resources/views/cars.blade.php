@extends('layouts.client')

@section('content')

<!-- tous les voitures -->
<div class="container mx-auto p-4 max-w-5xl">
  @foreach($cars as $car)
  <div class="bg-white rounded-t-md shadow-lg overflow-hidden flex flex-col sm:flex-row p-2 border-b-2">
    <div class="sm:w-1/3 py-4">
      <img src="{{ asset('images/voitures/'.$car->photo)}}" alt="Car Image" class="h-auto w-full p-2">
    </div>

    <div class="sm:w-1/3 px-2 py-4">
      <h2 class="text-2xl font-semibold">{{ $car->modele }}</h2>
      <p class="text-gray-700"> {{ $car->description }} </p>
    </div>

      <!-- Prix et Select button -->
    <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
      <div class="text-right">
        <p class="text-2xl font-semibold text-mediumBlue">{{ $car->prix}} Dh/Jour</p>
        <button class="font-semibold py-2 px-4 rounded-full bg-lightBlue mt-4 w-36 max-sm:w-full">Sélectionner</button>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection