@extends('layouts.client')

@section('content')

  {{-- Formulaire --}}
  <div class="w-full bg-slate-200">
    <div class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-de-dos.jpg')}});">
      <div class="h-full w-full bg-gray-950 bg-opacity-40">

        <div class="max-w-4xl mx-auto p-4 opacity-95">
          <div class="breadcrumbs font-montserrat text-base text-white">
            <ul>
              <li><a href="{{ route('accueil') }}" class="font-bold hover:text-teal-500">Accueil</a></li>
              <li>À propos</li>
            </ul>
          </div>

          @include('composants.landingFormulaire')

        </div>
      </div>
    </div>
  </div>

  {{-- Des voitures au bout de vos doigts --}}
  <div class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <h2 class="w-fit mx-auto md:text-3xl max-md:text-2xl font-montserrat font-semibold text-center py-3 text-transparent bg-clip-text bg-gradient-to-r from-sky-500 via-cyan-600 to-teal-500">
        À Propos</h2>
      <div class="w-full flex flex-col justify-center align-center gap-6 py-6">

        <div class="w-full grid md:grid-cols-2 grid-cols-1 justify-center align-center bg-white rounded-xl shadow-xl">
          <div class="flex flex-col justify-center align-center gap-4 max-md:text-justify p-5 max-md:py-8">
              <p class="font-bold lg:text-xl font-montserrat max-md:text-center">Simplicité et Rapidité</p>
              <p class="font-cabin lg:text-lg text-justify">La simplicité est au cœur de tout ce que nous faisons chez DriveEase.<br>
                Notre processus de réservation en ligne est rapide et facile, vous permettant de réserver votre voiture en quelques clics seulement.<br>
                En plus de notre engagement envers la qualité et le service client, nous nous efforçons également d'offrir des tarifs compétitifs et une transparence totale en matière de tarification.<br>
              </p>
          </div>
          <img src="{{ asset('images/composants/car-family.jpg')}}" alt="car-family" class="w-full h-full object-center object-cover md:rounded-r-xl max-md:rounded-b-xl">
        </div>

        <div class="w-full grid md:grid-cols-2 grid-cols-1 justify-center align-center md:bg-gradient-to-r max-md:bg-gradient-to-b from-bleufonce to-darkBlue text-white rounded-xl">
            <img src="{{ asset('images/composants/car-in-forest.jpg')}}" alt="car-in-forest" class="w-full h-full object-center object-cover md:rounded-l-xl max-md:rounded-t-xl">
            <div class="flex flex-col justify-center align-center gap-4 max-md:text-justify p-4 max-md:py-8">
                <p class="font-bold lg:text-xl font-montserrat max-md:text-center">Notre Engagement</p>
                <p class="font-cabin lg:text-lg text-justify">Nous nous engageons à offrir un service client exceptionnel.<br>
                  Notre équipe dévouée est là pour vous aider à trouver la voiture parfaite pour votre voyage, garantissant ainsi votre sécurité et votre tranquillité d'esprit sur la route.<br>
                </p>
            </div>
        </div>

      </div>
      
    </div>
  </div>

  {{-- Nos Avantages --}}
  {{-- <div class="w-full bg-white">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <p class="text-2xl font-montserrat font-semibold text-center py-3 text-mediumBlue">Nos Avantages</p>
      <div class="w-full grid md:grid-cols-3 max-md:grid-cols-1 justify-between align-center px-4 py-12 max-md:p-4 gap-4">

        <div class="w-full flex flex-col gap-3 p-3 justify-end text-center place-items-center max-w-sm mx-auto">
          <i class="ri-customer-service-2-line text-4xl text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-500"></i>
          <p class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 via-teal-400 to-cyan-500 ">Support Client</p>
          <p class="font-cabin lg:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <div class="w-full flex flex-col gap-3 p-3 justify-end text-center place-items-center max-w-sm mx-auto">
          <i class="ri-store-3-line text-4xl text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-500"></i>
          <p class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 via-teal-400 to-cyan-500 ">Plusieurs locaux</p>
          <p class="font-cabin lg:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <div class="w-full flex flex-col gap-3 p-3 justify-end text-center place-items-center max-w-sm mx-auto">
          <i class="ri-close-circle-line text-4xl text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-500" ></i>
          <p class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 via-teal-400 to-cyan-500 ">Annulation gratuite</p>
          <p class="font-cabin lg:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

      </div>
    </div>

  </div> --}}

  {{-- Comment procéder --}}
  <div class="w-full bg-white">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <p class="text-2xl font-montserrat font-semibold text-center py-3 text-mediumBlue">Comment procéder ?</p>
      <p class="font-cabin text-center lg:text-lg py-6">Grâce à notre processus de réservation en ligne rapide et intuitif, vous pouvez facilement trouver la voiture parfaite pour votre voyage, choisir vos dates et options, et finaliser votre réservation en un rien de temps.<br>
         Plus de tracas de longues files d'attente ou de paperasserie interminable - avec DriveEase, vous pouvez prendre la route en un instant, et profiter pleinement de votre voyage</p>


      <div class="grid md:grid-cols-2 max-md:grid-cols-1 justify-center align-center py-8 max-md:py-4 gap-4">

        <img src="{{ asset('images/composants/selection-voitures.png')}}" alt="selection-voitures.png" class="voiture-accueil object-center object-cover align-center my-auto">

        <div class="flex flex-col justify-center align-center gap-8 max-md:max-w-md mx-auto">
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-start">
            <i class="ri-map-pin-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <p class="font-bold font-montserrat">Lieu de Départ et Retour</p>
              <p class="font-cabin">La première étape : sélectionnez simplement le lieu de départ qui vous convient le mieux parmi notre réseau de points de service à travers la ville.</p>

            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-start">
            <i class="ri-calendar-check-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <p class="font-bold font-montserrat">Vos Dates de Location</p>
              <p class="font-cabin">Ensuite, choisissez les dates de votre location dans notre interface conviviale, et nous nous occupons du reste, vous garantissant une voiture prête à temps.</p>

            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-center">
            <i class="ri-roadster-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <p class="font-bold font-montserrat">Choisissez le Véhicule Parfait</p>
              <p class="font-cabin">Parcourez notre sélection variée de véhicules, choisissez celui qui correspond à vos besoins, et finalisez votre réservation en quelques clics.</p>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  {{-- Nos contacts --}}
  <div class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <p class="text-sm font-montserrat font-semibold text-center py-1 text-teal-500">DriveEase</p>
      <p class="text-3xl font-montserrat font-semibold text-center py-1 text-mediumBlue">Nos Contacts</p>

      @livewire('ContacterAdmin')

    </div>
  </div>

@endsection