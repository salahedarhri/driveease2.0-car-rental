@extends('layouts.client')

@section('content')

<article  x-data="{ scrollFocus(){ const element = document.getElementById('lieuDepart');
                     window.scrollTo({ top: 0, behavior: 'smooth' });  
                     setTimeout(() => element.focus(), 400);  }}">

  {{-- Formulaire --}}
  <section class="w-full bg-slate-200">
    <div class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-de-dos.jpg')}});">
      <div class="h-full w-full bg-gray-950 bg-opacity-40">

        <div class="max-w-4xl mx-auto px-4 py-8">
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
  </section>

  {{-- Des voitures au bout de vos doigts --}}
  <section class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <h1 class="w-fit mx-auto md:text-3xl max-md:text-2xl font-montserrat font-semibold text-center py-3 text-mediumBlue">
        À Propos</h1>
      <div class="w-full flex flex-col justify-center align-center gap-6 py-6">

        <div class="w-full grid md:grid-cols-2 grid-cols-1 justify-center align-center bg-white rounded-xl shadow-xl">
          <div class="flex flex-col justify-center align-center gap-4 max-md:text-justify p-5 max-md:py-8">
              <h2 class="font-bold lg:text-xl font-montserrat max-md:text-center text-mediumBlue">Simplicité et Rapidité</h2>
              <p class="font-cabin lg:text-lg text-justify">La simplicité est au cœur de tout ce que nous faisons chez DriveEase.<br>
                Notre processus de réservation en ligne est rapide et facile, vous permettant de réserver votre voiture en quelques clics seulement.<br>
                En plus de notre engagement envers la qualité et le service client, nous nous efforçons également d'offrir des tarifs compétitifs et une transparence totale en matière de tarification.<br>
              </p>
          </div>
          <img loading="lazy" src="{{ asset('images/composants/car-family-400w.jpg')}}" 
              srcset=" {{ asset('images/composants/car-family-400w.jpg') }} 400w, {{ asset('images/composants/car-family-600w.jpg') }} 600w, {{ asset('images/composants/car-family.jpg') }} 750w"
              alt="car-family" class="w-full h-full object-center object-cover md:rounded-r-xl max-md:rounded-b-xl">
        </div>

        <div class="w-full grid md:grid-cols-2 max-md:grid-cols-1 justify-center align-center md:bg-gradient-to-r max-md:bg-gradient-to-b from-bleufonce to-darkBlue text-white rounded-xl">
            <img loading="lazy" src="{{ asset('images/composants/car-in-forest-400w.jpg')}}" 
              srcset=" {{ asset('images/composants/car-in-forest-400w.jpg') }} 400w, {{ asset('images/composants/car-in-forest-600w.jpg') }} 600w, {{ asset('images/composants/car-in-forest.jpg') }} 750w"
              alt="car-in-forest" class="w-full h-full object-center object-cover md:rounded-l-xl max-md:rounded-b-xl">

            <div class="max-md:order-first flex flex-col justify-center align-center gap-4 max-md:text-justify p-4 max-md:py-8">
                <h2 class="font-bold lg:text-xl font-montserrat max-md:text-center text-teal-100">Notre Engagement</h2>
                <p class="font-cabin lg:text-lg text-justify">Nous nous engageons à offrir un service client exceptionnel.<br>
                  Notre équipe dévouée est là pour vous aider à trouver la voiture parfaite pour votre voyage, garantissant ainsi votre sécurité et votre tranquillité d'esprit sur la route.<br>
                </p>
            </div>
        </div>

      </div>
      
    </div>
  </section>

  {{-- Comment procéder --}}
  <section class="w-full bg-white">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <h2 class="text-2xl font-montserrat font-semibold text-center py-3 text-mediumBlue">Comment procéder ?</h2>
      <p class="font-cabin text-center lg:text-lg py-6">Grâce à notre processus de réservation en ligne rapide et intuitif, vous pouvez facilement trouver la voiture parfaite pour votre voyage,
        choisir vos dates et options, et finaliser votre réservation en un rien de temps.<br>
        Plus de tracas de longues files d'attente ou de paperasserie interminable - avec DriveEase, vous pouvez prendre la route en un instant, et profiter pleinement de votre voyage.
      </p>


      <div class="grid md:grid-cols-2 max-md:grid-cols-1 justify-center align-center py-8 max-md:py-4 gap-4">

        <img loading="lazy" src="{{ asset('images/composants/selection-voitures.png')}}" alt="selection-voitures.png" class="voiture-accueil object-center object-cover align-center my-auto">

        <div class="flex flex-col justify-center align-center gap-8 max-md:max-w-md mx-auto">
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-start">
            <i class="ri-map-pin-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <h3 class="font-bold font-montserrat text-mediumBlue">Lieu de Départ et Retour</h3>
              <p class="font-cabin">La première étape : sélectionnez simplement le lieu de départ qui vous convient le mieux parmi notre réseau de points de service à travers la ville.</p>
            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-start">
            <i class="ri-calendar-check-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <h3 class="font-bold font-montserrat text-mediumBlue">Vos Dates de Location</h3>
              <p class="font-cabin">Ensuite, choisissez les dates de votre location dans notre interface conviviale, et nous nous occupons du reste, vous garantissant une voiture prête à temps.</p>
            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-3 place-items-center md:place-items-center">
            <i class="ri-roadster-line rounded-lg  text-3xl text-white p-2 bg-gradient-to-b from-teal-500 via-sky-500 to-cyan-500"></i>
            <div class="flex flex-col gap-2 px-3 max-md:text-center lg:text-lg">
              <h3 class="font-bold font-montserrat text-mediumBlue">Choisissez le Véhicule Parfait</h3>
              <p class="font-cabin">Parcourez notre sélection variée de véhicules, choisissez celui qui correspond à vos besoins, et finalisez votre réservation en quelques clics.</p>
            </div>
          </div>
          <button @click="scrollFocus()" class="w-fit mx-auto font-semibold font-montserrat text-white px-6 py-2 bg-gradient-to-r from-teal-500 to-cyan-500 hover:saturate-150 transition-all hover:shadow-xl rounded-lg shadow-lg">Réserver maintenant</button>
        </div>

      </div>
    </div>
  </section>

  {{-- Nos contacts --}}
  <section class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto max-md:p-4 md:p-6">
      <h2 class="text-sm font-montserrat font-semibold text-center py-1 text-teal-500">DriveEase</h2>
      <h3 class="text-3xl font-montserrat font-semibold text-center py-1 text-mediumBlue">Nos Contacts</h3>

      @livewire('ContacterAdmin')

    </div>
  </section>

</article>

@endsection