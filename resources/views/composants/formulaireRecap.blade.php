<div class="w-full bg-gradient-to-r from-sky-700 to-sky-800 px-4 pb-4 pt-2">

  <div class="grid grid-cols-3 max-sm:grid-cols-1 max-w-4xl mx-auto font-cabin bg-white rounded-xl">

    {{-- Date et Lieu --}}
    <div class="max-sm:text-center p-2 hover:bg-slate-100 transition duration-300 sm:rounded-l-xl max-sm:rounded-t-xl">
      <a href="{{ route('accueil')}}" class="flex flex-col align-center">

        <div class="flex flex-row px-2 py-1 justify-between align-center text-cyan-600">
          <p class="font-bold text-center font-montserrat"><i
              class="ri-calendar-line font-normal text-2xl pr-2"></i>Lieu et Date</p>
          <i class="opacity-50 ri-edit-line text-2xl"></i>
        </div>

        <div class="px-3 py-1 text-sm">
          <p class="font-semibold font-montserrat ">Départ</p>
          <p>@if(isset($lieuDepart)) {{ $lieuDepart }} @else - @endif</p>
          <p>Le @if(isset($dateDepartDt)) {{ $dateDepartDt }} @else - @endif</p>
        </div>

        <div class="px-3 py-1 text-sm">
          <p class="font-semibold font-montserrat ">Retour</p>
          <p>@if(isset($lieuRetour)) {{ $lieuRetour }} @else - @endif</p>
          <p>Le @if(isset($dateRetourDt)) {{ $dateRetourDt }} @else - @endif</p>
        </div>
      </a>
    </div>

    {{-- Voiture --}}
    <div class="flex flex-col p-2 sm:border-x max-sm:border-y border-opacity-50 border-slate-300 hover:bg-slate-100 transition duration-300">
      <div class="flex flex-row px-2 py-1 justify-between align-center text-cyan-600">
        <p class="font-bold  text-center font-montserrat"><i
            class="ri-roadster-fill font-normal text-2xl pr-2"></i>Voiture</p>
        <i class="opacity-50 ri-edit-line text-2xl"></i>
      </div>
      @if(isset($voiture))
        <button wire:click="RetournerVoitures" class="cursor-pointer">
          <div class="flex flex-col justify-center align-center gap-1 text-center font-montserrat text-sm">
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="Car Image"
              class="h-20 w-auto object-center object-contain">
            <p class="text-base">{{ $voiture->modele }}</p>
            <p class="font-semibold text-teal-600">{{ $voiture->prix * $nbJrs }} DH</p>
          </div>
        </button>
      @else
      <p class="font-cabin text-center px-2 py-4 max-w-sm self-center max-md:text-sm">Aucune véhicule choisie pour le
        moment.<br>Veuillez choisir un véhicule</p>
      @endif
    </div>

    {{-- Franchise --}}
    <div
      class="flex flex-col align-center text-center p-2 sm:border-r max-sm:border-b border-opacity-50 border-slate-300 font-montserrat hover:bg-slate-100 transition duration-300 sm:rounded-r-xl max-sm:rounded-b-xl">

      <div class="flex flex-row px-2 py-1 justify-between align-center text-cyan-600">
        <p class="font-bold text-cyan-600 text-left"><i class="ri-shield-line font-normal text-2xl pr-2"></i>Assurance
        </p>
        <i class="opacity-50 ri-edit-line text-2xl"></i>
      </div>

      @if( isset($protectionChoisi) && isset($voiture))
        <button wire:click="RetournerProtection" class="w-full h-full">
          <div class="flex flex-row justify-between p-2 text-sm max-md:gap-4 w-52 mx-auto">
            <div class="text-left max-md:text-center">
              <p class="text-base">{{ $protectionChoisi->type }}</p>
              <p class="font-semibold  text-teal-600">{{ $prixPrtc }} Dh</p>
            </div>

            @if( isset($optnsIds))
            <div class="text-center px-2 border-l border-l-mediumBlue">
              <p class="">{{ count($optnsIds) }} Options</p>
              <p class="font-semibold  text-teal-600">{{ $prixOptns }} DH</p>
            </div>
            @else
            <div class="text-center px-2 border-l border-l-mediumBlue">
              <p class="">0 Option</p>
              <p class="font-semibold  text-teal-600">---</p>
            </div>
            @endif
          </div>
        </button>
      @else
      <p class="font-cabin text-center px-2 py-4 max-w-sm self-center text-base max-md:text-sm">Vous pourrez choisir
        votre protection et vos options après avoir sélectionné votre véhicule</p>
      @endif
    </div>


  </div>

</div>