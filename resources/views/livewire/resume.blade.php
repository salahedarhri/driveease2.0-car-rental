<div>
  @include('composants.formulaireRecap')

  {{-- Titre + total --}}
  <div id="navbar-total" class="w-full bg-white shadow-xl z-50">
    <div
      class="flex flex-row justify-between max-md:justify-center place-items-center max-w-7xl mx-auto p-2 px-3 font-montserrat ">
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

  <div class="w-full bg-slate-100 border-y border-slate-400">
    <div class="max-w-7xl mx-auto pt-6 px-3 pb-8 ">

      <div class="flex flex-row justify-between max-sm:flex-col max-sm:justify-center max-sm:text-center">
        <p class="text-2xl font-bold font-montserrat pb-6">Détails du conducteur</p>
        <p class="text-base font-cabin">*Champ Obligatoire</p>
      </div>

      <form wire:submit.prevent="validerConducteur"
        class="grid grid-cols-2 max-sm:grid-cols-1 gap-4 justify-center align-center max-w-3xl mx-auto font-montserrat md:p-5 max-md:p-3 rounded">

        <label for="prenomConducteur" class="flex flex-col gap-1 font-semibold">Prénom*
          <input type="text" wire:model="prenomConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-400 font-normal border-2">
          @error('prenomConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="nomConducteur" class="flex flex-col gap-1 font-semibold">Nom*
          <input type="text" wire:model="nomConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-400 font-normal border-2">
          @error('nomConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="dateNsConducteur" class="flex flex-col gap-1 font-semibold">Date de naissance*
          <input type="date" wire:model="dateNsConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-400 font-normal border-2">
          @error('dateNsConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="emailConducteur" class="flex flex-col gap-1 font-semibold">Email*
          <input type="email" wire:model="emailConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-400 font-normal border-2">
          @error('emailConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="numTelConducteur"
          class="col-span-2 flex flex-col gap-1 font-semibold sm:w-80 max-sm:w-full max-sm:col-span-1 mx-auto">Numéro de
          téléphone*
          <input type="tel" wire:model="numTelConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-400 font-normal border-2">
          @error('numTelConducteur') <p class="text-red-600 text-sm p-1">{{ $message }}</p>@enderror
        </label>

      </form>

    </div>

  </div>

  <div class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto sm:px-8 sm:py-12 max-sm:px-4 max-sm:py-8">
      <div class="flex flex-col w-full md:flex-row">
        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center font-montserrat">

          {{-- Paiement via Stripe --}}
          <div
            class="w-full border p-3 bg-white border-mediumBlue rounded-lg shadow-xl flex flex-col justify-center gap-4 align-center">
            <p
              class="text-xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-stripe">
              Paiement en ligne via <img class="inline w-16 p-0" src="{{ asset('images/icons/stripe.svg')}}" /></p>
            <p class="font-cabin text-lg p-3 pb-6 text-justify">Optez pour le règlement en ligne de votre location et
              bénéficiez d'une remise immédiate de <b class="text-teal-600">5%</b>.<br>Cette méthode garantit la
              disponibilité du véhicule et offre la possibilité de remboursement en cas de besoin.</p>

            <form action="{{ route('checkout')}}" method="post" class="w-full flex justify-center align-center">
              @csrf
              <button
                class="font-semibold text-white bg-stripe hover:bg-gradient-to-r from-indigo-600 via-stripe to-purple-600 rounded-lg shadow py-3 px-6 w-fit mx-auto">
                Payer En Ligne
              </button>
            </form>
            {{-- <p class="text-opacity-50 italic text-sm p-3"><b class="text-teal-400">Note :</b> C'est préférable que
              le paiement soit effectué par le conducteur/conductrice en personne.</p> --}}
          </div>
        </div>
        <div class="divider md:divider-horizontal font-montserrat">Ou</div>
        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center font-montserrat">

          {{-- Paiement à l'agence --}}
          <div
            class="w-full border p-3 bg-white border-mediumBlue rounded-lg shadow-xl flex flex-col justify-center gap-4 align-center">
            <p
              class="text-xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-teal-600">
              Paiement à l'agence</p>
            <p class="font-cabin text-lg p-3 pb-6 text-justify">Si vous préférez régler votre location directement
              à notre
              agence, notre
              équipe sera ravie de vous assister.<br>Bien que vous ne bénéficiez pas de la réduction de <b
                class="text-teal-600">5%</b>, vous
              profiterez d'un service personnalisé et de notre assistance sur place.</p>
            <button
              class="font-semibold text-white bg-teal-500 hover:bg-gradient-to-r from-teal-500 via-teal-400 to-cyan-500 rounded-lg shadow py-3 px-6 w-fit mx-auto">
              Payer À L'agence
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>



{{-- <div class="w-full bg-slate-200">
  <div class="max-w-5xl mx-auto p-4">

    <p class="text-2xl font-bold font-montserrat pb-4">Résumé</p>

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
            <p><img src="{{ asset('images/icons/identity-card.svg')}}" class="w-6 h-6 align-middle inline-block"></img>
              {{ $voiture->minAge }}</p>
            @if( $voiture->climatisation == true )
            <p><img src="{{ asset('images/icons/climatisation.svg')}}" class="w-6 h-6 align-middle inline-block"></img>
              Climatisation</p>
            @endif
          </div>
          @endif
        </div>

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


</div> --}}