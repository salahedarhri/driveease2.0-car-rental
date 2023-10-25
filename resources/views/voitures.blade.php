@extends('layout')

@section('content')

<!-- tous les voitures -->
<div class="p-4 m-4 bg-orange-100">
  <h1>Tous les voitures</h1>

  @foreach($cars as $car)
    <div class="p-2 m-2 flex flex-col items-center">
      <div class="flex flex-row">
        <p class="p-1"> {{ $car->modele }} </p>
        <p class="p-1"> {{ $car->prix }} DH/jour</p>
      </div>
      <p class="p-1"> {{ $car->description }} </p>

    </div>
  @endforeach
</div>

<!-- Voitures Disponibles -->
<div class="p-4 m-4 bg-emerald-100">
  <h2>Tous les voitures</h2>

@foreach($cars as $car)
  @if($car->disponibilite == true)

  <div class="p-2 m-2 flex flex-col items-center">
    <div class="flex flex-row">
      <p class="p-1"> {{ $car->modele }} </p>
      <p class="p-1"> {{ $car->prix }} DH/jour</p>
    </div>
    <p class="p-1"> {{ $car->description }} </p>
  </div>

  @endif
@endforeach
</div>

@endsection