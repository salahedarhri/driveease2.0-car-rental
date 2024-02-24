@extends('layouts.client')

@section('content')


<div class="w-full bg-slate-200 ">

  <div class="max-w-5xl mx-auto p-4">
    <div class="breadcrumbs font-montserrat text-base">
      <ul>
        <li><a href="{{ route('accueil') }}" class="font-bold hover:text-teal-500">Accueil</a></li>
        <li><a href="{{ route('cars') }}" class="hover:text-teal-500">Voitures</a></li>
      </ul>
    </div>

    @include('composants.landingFormulaire')
  </div>
</div>

<div class="w-full bg-white">
  <div class="max-w-5xl mx-auto p-4">
    <p class="text-2xl font-montserrat font-semibold text-center">Notre sélection de voitures</p>
  </div>
</div>





@endsection