@extends('layouts.client')

@section('content')

<div class="flex flex-col items-center p-2 m-5 text-lg bg-emerald-100">
  <p>Lieu de départ : {{ $lieuDepart }}</p>
  <p>Lieu de retour : {{ $lieuRetour }}</p>
  <p>Date de départ : {{ $dateDepart }}</p>
  <p>Date de retour : {{ $dateRetour }}</p>
</div>

<div class="container mx-auto p-4 max-w-5xl">

  @if ($voituresDisponibles->isEmpty())
    <p>Aucune voiture disponible pour les critères spécifiés.</p>
  @else

    @foreach ($voituresDisponibles as $car)
    <x-car :car="$car"/>
    @endforeach

</div>
  @endif

@endsection