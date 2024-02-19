<div>
  @include('composants.formulaireRecap')

  {{-- Titre + total --}}
  <div id="navbar-total" class="w-full bg-white shadow-xl">
    <div
      class="flex flex-row justify-between max-md:justify-center place-items-center max-w-5xl mx-auto p-2 px-3 font-montserrat ">
      <p class="text-xl max-md:hidden font-semibold">Récapitulatif de votre réservation</p>

      <div class="flex flex-row place-items-center  gap-6 text-xl p-2">
        @if(isset($voiture) && isset($protectionChoisi) && isset($optnsIds))
        <div class="flex flex-row gap-1">
          <p class="font-semibold">Total : </p>
          <p class="font-bold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc + $prixOptns }} DH</p>
        </div>
        @elseif( isset($voiture) && isset($protectionChoisi))
        <div class="flex flex-row gap-1">
          <p class="font-semibold">Total :</p>
          <p class="font-bold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc }} DH</p>
        </div>
        @else
        <p> ---- </p>
        @endif

      </div>
    </div>

  </div>

  <div class="w-full bg-slate-200">
    <div class="max-w-5xl mx-auto p-4">

      <p class="text-2xl font-bold font-montserrat pb-4">Résumé</p>

      {{-- Section Voiture --}}
      <div class="flex flex-col w-full p-4 border border-darkBlue border-opacity-50 rounded-lg bg-white">
        <div class="w-full flex flex-row justify-between text-xl max-sm:text-base px-3">
          <p class="font-bold font-montserrat">Voiture</p>
          <p class="font-bold font-montserrat text-teal-600">@if( isset($voiture)){{ $voiture->prix * $nbJrs }} DH
            @else---@endif</p>
        </div>

        <div class="w-full grid grid-cols-2 max-md:grid-cols-1 py-4">

          <div class="w-full bg-slate-100 py-4 px-2">
            @if( isset($voiture))
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="Car Image"
              srcset="aspect-square object-center object-contain">
            <p class="text-lg font-bold font-montserrat pl-4 py-4">{{ $voiture->modele }}</p>

            <div class="flex flex-row gap-3 font-cabin max-md:text-sm align-center md:pl-2">
              <p><img src="{{ asset('images/icons/personne.svg')}}" class="w-6 h-6 align-middle inline-block"> {{
                $voiture->nbPers }}</p>
              <p><img src="{{ asset('images/icons/transmission.svg')}}" class="w-6 h-6 align-middle inline-block"></img>
                {{ $voiture->transmission }}</p>
              <p><img src="{{ asset('images/icons/identity-card.svg')}}"
                  class="w-6 h-6 align-middle inline-block"></img> {{ $voiture->minAge }}</p>
              @if( $voiture->climatisation == true )
              <p><img src="{{ asset('images/icons/climatisation.svg')}}"
                  class="w-6 h-6 align-middle inline-block"></img> Climatisation</p>
              @endif
            </div>
            @endif
          </div>

          {{-- Départ & Retour --}}
          <div class="w-full bg-white font-montserrat p-4 pr-0 max-md:px-0 my-auto">
            <p class="text-lg font-bold ">Départ & retour</p>
            <div class="flex flex-col align-center border rounded">
              <div class="border-b-2 border-darkBlue border-opacity-30 bg-slate-100 p-3 text-base">
                <p class="font-bold pb-3">Départ</p>
                <p class="font-cabin">{{ $dateDepartDt }}</p>
                <p class="font-cabin">{{ $lieuDepart }}</p>
              </div>
              <div class="bg-slate-100 p-3">
                <p class="font-bold pb-3">Retour</p>
                <p class="font-cabin">{{ $dateRetourDt }}</p>
                <p class="font-cabin">{{ $lieuRetour }}</p>
              </div>

            </div>
          </div>
        </div>
      </div>

      {{-- Section Protection & Options --}}
      <div class="flex flex-col w-full pt-4 border border-darkBlue border-opacity-50 rounded-lg bg-white mt-8">
        <div class="w-full flex flex-row justify-between text-xl max-sm:text-base px-4">
          <p class="font-bold font-montserrat">Protection & Options</p>
          <p class="font-bold font-montserrat text-teal-600">@if( isset($prtcChoisi)){{ $prixPrtc + $prixOptns }} DH
            @else --- @endif
          </p>
        </div>

        <div class="w-full flex flex-col pt-4">
          <div class="flex flex-row justify-between align-center font-cabin py-3 px-4 border-b max-sm:text-sm">
            <p class="pl-2 w-1-3 ">{{ $prtcChoisi->type }}</p>
            <p class="w-1-3 text-center">Pour {{ $nbJrs }} Jour(s)</p>
            <p class="w-1-3 font-bold text-right pr-2">{{ $prixPrtc }} DH</p>
          </div>

          @if( $options != null )
          @foreach ($options as $optn)
          <div class="flex flex-row justify-between align-center font-cabin py-3 px-4 border-b max-sm:text-sm">
            <p class="pl-2 w-1/3">{{ $optn->option }}</p>
            <p class="w-1/3 text-center">Pour {{ $nbJrs }} Jour(s)</p>
            <p class="w-1/3 font-bold text-right pr-2">{{ $optn->prix }} DH</p>
          </div>

          @endforeach
          @endif

        </div>
      </div>

      <div
        class="flex flex-col w-full p-4 border border-darkBlue border-opacity-50 rounded-lg bg-white mt-8 shadow-inner shadow-teal-600">
        <div class="flex flex-row justify-between text-3xl">
          <p class="font-montserrat font-bold">Total</p>
          <p class="text-teal-600 font-montserrat font-bold">{{ ($voiture->prix * $nbJrs) + $prixPrtc +
            $prixOptns }} DH</p>
        </div>
        <p class="text-xs font-cabin">Payer en Agence</p>
      </div>
    </div>


  </div>

  <div class="w-full bg-stone-50">
    <div class="max-w-5xl mx-auto p-6">

      <div class="flex flex-row justify-between max-sm:flex-col max-sm:justify-center max-sm:text-center p-3">
        <p class="text-2xl font-bold font-montserrat pb-4">Détails du conducteur</p>
        <p class="text-base font-cabin">*Champ Obligatoire</p>
      </div>

      <form wire:submit.prevent="validerConducteur"
        class="flex flex-col gap-4 justify-center align-center max-w-xl mx-auto font-montserrat md:p-5 max-md:p-3 border border-slate-400 bg-slate-200 rounded">

        <label for="prenomConducteur" class="flex flex-col gap-1 font-semibold">Prénom*
          <input type="text" wire:model.lazy="prenomConducteur"
            class="focus:ring-0 focus:border-teal-500 rounded-lg border-slate-400 font-normal">
          @error('prenomConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

        <label for="nomConducteur" class="flex flex-col gap-1 font-semibold">Nom*
          <input type="text" wire:model.lazy="nomConducteur"
            class="focus:ring-0 focus:border-teal-500 rounded-lg border-slate-400 font-normal">
          @error('nomConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

        <label for="dateNsConducteur" class="flex flex-col gap-1 font-semibold">Date de naissance*
          <input type="date" wire:model.lazy="dateNsConducteur"
            class="focus:ring-0 focus:border-teal-500 rounded-lg border-slate-400 font-normal">
          @error('dateNsConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

        <label for="emailConducteur" class="flex flex-col gap-1 font-semibold">Email*
          <input type="email" wire:model.lazy="emailConducteur"
            class="focus:ring-0 focus:border-teal-500 rounded-lg border-slate-400 font-normal">
          @error('emailConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

        <label for="numTelConducteur" class="flex flex-col gap-1 font-semibold">Numéro de téléphone*
          <input type="tel" wire:model.lazy="numTelConducteur"
            class="focus:ring-0 focus:border-teal-500 rounded-lg border-slate-400 font-normal">
          @error('numTelConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

      </form>

    </div>

  </div>

  <div class="w-full bg-slate-200">
    <div class="max-w-5xl mx-auto">

    </div>

  </div>
</div>

@once

@endonce