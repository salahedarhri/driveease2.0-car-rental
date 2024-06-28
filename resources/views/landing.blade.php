@extends('layouts.client')

@section('content')

<article x-data="{ imageLanding:false }" class="w-full bg-slate-200">
  {{-- First Section : done --}}
    <section class="max-w-7xl mx-auto pb-8">
      <div class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center">
        <div class="px-4 md:pt-12 max-md:pt-6 max-md:text-center">
          <span class="text-sm px-2 text-teal-500">____Bienvenue chez DriveEase</span>
          <h1 class="md:text-4xl max-md:text-3xl py-3 text-sky-800 font-bold">Trouvez la voiture qui vous correspond</h1>
          <p class="text-md text-sky-950 pb-3">&ensp;Que vous planifiez une escapade en ville, une aventure sur la route
            ou un voyage d'affaires, notre processus de réservation convivial
            vous permet de trouver et de réserver la voiture parfaite en quelques clics.
          </p>
        </div>
        <div x-intersect:enter="imageLanding=true" class="px-4">
          <img loading="eager" x-show="imageLanding" x-transition.duration.500.delay.500 src="{{ asset('images/composants/landing.png') }}" alt="Blue renault car facing sideways" 
          class="voiture-accueil aspect-auto my-auto">
        </div>
      </div>

      @include('composants.landingFormulaire')

    </section>

  {{-- Second Section : done --}}
  <section class="w-full bg-white flex flex-col gap-4 place-items-center text-center font-montserrat md:py-12 max-md:py-8">
    <span class="text-sm px-2 pt-3 text-teal-500">Comment ça marche ?</span>
    <h2 class="md:text-3xl max-md:text-2xl py-2 text-sky-800 font-bold">Votre Réservation en 3 étapes</h2>
    <div class="grid md:grid-cols-3 max-md:grid-cols-1 justify-center items-stretch gap-4 mx-auto lg:py-8">
        <section class="flex flex-col gap-3 p-3 justify-between text-center items-center max-w-sm mx-auto">
            <span class="p-2 bg-gray-200 border-white border-2 shadow-lg rounded-lg flex items-center justify-center">
                <i class="ri-car-fill text-4xl text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-400"></i>
            </span>
            <h3 class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-500">Choisissez votre voiture</h3>
            <p class="font-cabin text-darkBlue">Accédez à DriveEase et indiquez où et quand vous avez besoin d'une voiture.<br> Explorez notre gamme de véhicules, de la compacte économique au SUV spacieux, et trouvez celui qui vous convient en quelques clics!</p>
        </section>
        <section class="flex flex-col gap-3 p-3 justify-between text-center items-center max-w-sm mx-auto">
            <span class="p-2 bg-gradient-to-r from-teal-500 to-cyan-500 shadow-md shadow-teal-500 rounded-lg flex items-center justify-center">
                <i class="ri-store-3-line text-4xl text-white"></i>
            </span>
            <h3 class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-500">Ajoutez vos options</h3>
            <p class="font-cabin text-darkBlue">Vous avez choisi votre voiture? Super! Entrez vos informations personnelles et ajoutez des options comme un GPS ou un siège enfant.<br> Personnalisez votre voyage pour un confort optimal.</p>
        </section>
        <section class="flex flex-col gap-3 p-3 justify-between text-center items-center max-w-sm mx-auto">
            <span class="p-2 bg-gray-200 border-white border-2 shadow-lg rounded-lg flex items-center justify-center">
                <i class="ri-verified-badge-fill text-4xl text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-400"></i>
            </span>
            <h3 class="font-bold font-montserrat lg:text-xl text-lg text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-500">Confirmez et Payez</h3>
            <p class="font-cabin text-darkBlue">Vérifiez les détails de votre réservation, choisissez votre mode de paiement, et finalisez en quelques secondes. Vous recevrez immédiatement une confirmation par e-mail.<br> Avec DriveEase, réservez et partez l'esprit tranquille!</p>
        </section>
    </div>
  </section>

  {{-- Third Section : Done --}}
  @livewire('NewsletterAccueil')

  {{-- Fourth Section --}}
  <section>

  </section>

</article>
@endsection
