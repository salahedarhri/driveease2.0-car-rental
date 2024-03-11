@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 ">

  <div class="max-w-5xl mx-auto p-4">
    <div class="breadcrumbs font-montserrat text-base">
      <ul>
        <li><a href="{{ route('accueil') }}" class="font-bold hover:text-teal-500">Accueil</a></li>
        <li><a href="{{ route('apropos') }}" class="hover:text-teal-500">À propos</a></li>
      </ul>
    </div>

    @include('composants.landingFormulaire')
  </div>
</div>

<div class="w-full bg-slate-300">
  <div class="max-w-5xl mx-auto p-4">
    <p class="text-2xl font-montserrat font-semibold text-center">Des voitures au bout de vos doigts</p>

    <div class="w-full flex flex-col justify-center align-center gap-3 py-3">

        <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 justify-center align-center p-3 bg-slate-100 rounded-xl shadow-xl">
            <img src="{{ asset('images/composants/car-in-forest.jpg')}}" alt="car-in-forest" class="w-full h-full object-center object-cover md:rounded-l-xl max-md:rounded-xl">
            <div class="flex flex-col justify-center align-center gap-4 max-md:text-justify">
                <p class="font-bold text-xl font-montserrat">Notre Engagement</p>
                <p class="font-cabin text-lg">Nous nous engageons à offrir un service client exceptionnel.<br> Notre équipe dévouée est là pour vous aider à trouver la voiture parfaite pour votre voyage, garantissant ainsi votre sécurité et votre tranquillité d'esprit sur la route.</p>
            </div>
        </div>

        <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4 justify-center align-center p-3 bg-slate-100 rounded-xl shadow-xl">
            <div class="flex flex-col justify-center align-center gap-4 max-md:text-justify">
                <p class="font-bold text-xl font-montserrat">Notre Engagement</p>
                <p class="font-cabin text-lg">Nous nous engageons à offrir un service client exceptionnel.<br> Notre équipe dévouée est là pour vous aider à trouver la voiture parfaite pour votre voyage, garantissant ainsi votre sécurité et votre tranquillité d'esprit sur la route.</p>
            </div>
            <img src="{{ asset('images/composants/car-in-forest.jpg')}}" alt="car-in-forest" class="w-full h-full object-center object-cover md:rounded-l-xl max-md:rounded-xl ">
        </div>
    </div>

    
  </div>
</div>


@endsection