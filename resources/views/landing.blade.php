@extends('layouts.client')

@section('content')

    <!-- First Part -->
    <div class="w-screen bg-slate-200">

      <div class="max-w-7xl mx-auto pb-4">
        <div class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center">
          <div class="px-4 md:pt-12 max-md:pt-6 max-md:text-center">
            <p class="text-sm px-2 text-teal-500">____Bienvenue chez DriveEase</p>
            <p class="md:text-4xl max-md:text-2xl py-3 text-sky-800 font-bold">Trouvez la voiture qui vous correspond</p>
            <p class="text-md text-sky-950 pb-3">&ensp;Que vous planifiez une escapade en ville, une aventure sur la route ou un voyage d'affaires, notre processus de réservation convivial 
              vous permet de trouver et de réserver la voiture parfaite en quelques clics.
            </p>
            <!-- <button class="px-5 py-3 text-sm font-semibold rounded-lg shadow-lg bg-teal-500 hover:bg-teal-600 text-white mx-3 my-6 uppercase transition-all">Réservez dès maintenant</button> -->
          </div>

          <div class="svgBackground px-4 max-md:hidden">
            <img src="{{ asset('images/composants/landing.png') }}" alt="landing car photo" class="aspect-auto my-auto">
          </div>

        </div>

        <!-- Formulaire -->
        @include('composants.landingFormulaire')

      </div>
    </div>

    <!-- Carousel -->
    @include('composants.landingCarousel')
    
    <!-- Third part -->
    <div class="w-screen bg-gradient-to-r from-sky-700 to-teal-700">
      <div class="max-w-7xl  mx-auto ">
        <div class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center md:h-96">
          
          <div class="svgBackground p-4 ">
            <img src="{{ asset('images/composants/newsletter.png') }}" alt="landing car photo" class="aspect-auto my-auto">
          </div>

          <div class="px-4 md:pt-12 max-md:pb-6 max-md:text-center align-center justify-center">
            <p class="text-slate-100   text-lg font-semibold py-4 max-md:pb-2">Souscrivez pour recevoir nos dernières nouveautés</p>

            <div class="flex flex-row gap-2 bg-white p-2 m-2 max-w-md items-center justify-between rounded shadow-xl max-md:mx-auto">
              
              <input type="email" name="newsletter" id="" placeholder="Votre adresse email" class="md:w-72 max-md:w-full p-2 m-3 rounded-md border-teal-400 shadow-md text-sm">
              <input type="submit" value="Envoyer" class="bg-teal-500 hover:bg-teal-700 transition-all text-white rounded shadow-md font-semibold uppercase py-2 px-3 cursor-pointer">
            </div>
          </div>


        </div>
      </div>
    </div>  

  <!-- fourth part -->
    <div class="w-screen bg-blue-100">
      <div class="font-montserrat grid md:grid-cols-3 max-md:grid-cols-1 justify-center max-w-7xl mx-auto md:p-10 max-md:p-3 text-white md:gap-8 max-md:gap-3">

        <!-- Calendar -->
        <div class="md:w-full max-md:w-80 text-center px-6 max-md:py-3 md:py-6 mx-auto bg-gradient-to-r from-teal-500 to-sky-500 rounded-xl shadow">
          <i class="ri-calendar-line text-2xl"></i>
          <p class="text-lg font-semibold py-2">Choisissez la date</p>
          <p class="lg:text-md max-lg:text-sm py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>
        </div>
        <!-- Car -->
        <div class="md:w-full max-md:w-80 text-center px-6 max-md:py-3 md:py-6 mx-auto bg-gradient-to-r from-teal-500 to-sky-500 rounded-xl shadow">
          <i class="ri-roadster-line text-2xl"></i>
          <p class="text-lg font-semibold md:py-2 max-md:py-1">Désignez votre voiture</p>
          <p class="mlgtext-md max-lg:text-sm md:py-3 max-md:py-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>
        </div>
        <!-- Payment -->
        <div class="md:w-full max-md:w-80 text-center px-6 max-md:py-3 md:py-6 mx-auto bg-gradient-to-r from-teal-500 to-sky-500 rounded-xl shadow">
          <i class="ri-bank-card-line text-2xl"></i>
          <p class="text-lg font-semibold py-2">Moyens diverses de payement</p>
          <p class="lg:text-md max-lg:text-sm py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>
        </div>                
      </div>
    </div>


@endsection