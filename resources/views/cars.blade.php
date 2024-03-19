@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200">
  <div class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-cote.jpg')}});">
    <div class="h-full w-full bg-gray-950 bg-opacity-40">

      <div class="max-w-4xl mx-auto p-4 opacity-95">
        <div class="breadcrumbs font-montserrat text-base text-white">
          <ul>
            <li><a href="{{ route('accueil') }}" class="font-bold hover:text-teal-500">Accueil</a></li>
            <li>Voitures</li>
          </ul>
        </div>

        @include('composants.landingFormulaire')

      </div>
    </div>
  </div>
</div>

<div class="w-full bg-white">
  <div class="max-w-7xl mx-auto p-4">

      
    
  </div>
</div>


@endsection