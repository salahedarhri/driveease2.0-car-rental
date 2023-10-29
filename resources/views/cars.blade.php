@extends('layout')

@section('content')

<!-- tous les voitures -->
<div class="container mx-auto p-4 max-w-5xl">

  <p class="text-xl font-semibold underline m-3">Tous les voitures</p>

  @foreach($cars as $car)

  <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row p-2 border-b-2">
    <div class="sm:w-1/3 py-4">
      <img src="{{ asset('images/voitures/'.$car->photo)}}" alt="Car Image" class="h-auto w-full">
    </div>
    <div class="sm:w-1/3 px-2 py-4">
      <h2 class="text-2xl font-semibold">{{ $car->model }}</h2>
      <p class="text-gray-700"> {{ $car->description }} </p>
      <button class="show-details-btn font-semibold py-3 px-7 rounded-full focus:outline-none mx-2 mt-7">&#11206  Plus de détails</button>

      <div class="additional-info hidden mt-4">
        Additional information for Card 2.
      </div>
    </div>
    <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
      <div class="text-right">
        <p class="text-2xl font-semibold text-blue-500">$120</p>
        <p class="text-gray-700">Tax: $12</p>
        <p class="text-lg font-semibold mt-4">Total: $132</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full focus:outline-none mt-4 w-36 max-sm:w-full">Sélectionner</button>
      </div>
    </div>
  </div>

  @endforeach

</div>


@endsection