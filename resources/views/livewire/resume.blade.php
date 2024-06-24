<article x-data="{ navbar:false ,sticky:$refs.filtres.offsetTop }" @scroll.window="navbar=(window.pageYOffset > sticky)?true:false">
  @include('composants.formulaireRecap')

  {{-- Titre + total --}}
  <section x-ref="filtres" x-bind:class="navbar?'fixed top-0':''" class="w-full bg-white z-50 shadow-xl">
    <div class="flex flex-row justify-between max-md:justify-center place-items-center max-w-7xl mx-auto p-2 px-3 font-montserrat ">
      <h1 class="text-xl max-md:hidden font-semibold">Récapitulatif de votre réservation</h1>

      <div class="flex flex-row place-items-center  gap-6 text-xl p-2">
        @if(isset($voiture) && isset($protectionChoisi) && isset($optnsIds))
          <div class="flex flex-row gap-1">
            <span class="font-semibold">Total : </span>
            <p class="font-bold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc + $prixOptns }} DH</p>
          </div>
        @elseif( isset($voiture) && isset($protectionChoisi))
          <div class="flex flex-row gap-1">
            <span class="font-semibold">Total :</span>
            <p class="font-bold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc }} DH</p>
          </div>
        @else
          <span> ---- </span>
        @endif
      </div>
    </div>

  </section>

  {{-- Résumé --}}
  <section class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto p-4">

      <p class="text-2xl font-bold font-montserrat pb-4 max-sm:text-center">Résumé</p>

      <div class="flex flex-col w-full p-4 border border-darkBlue border-opacity-50 rounded-lg bg-white">
        <div class="w-full flex flex-row justify-between text-xl max-sm:text-base px-3">
          <p class="font-bold font-montserrat">Voiture</p>
          <p class="font-bold font-montserrat text-teal-600">@if( isset($voiture)){{ $voiture->prix * $nbJrs }} DH
            @else---@endif</p>
        </div>
        <div class="w-full grid grid-cols-2 max-md:grid-cols-1 py-4">

          <div class="w-full bg-slate-100 py-4 px-3 rounded shadow">
            @if( isset($voiture))
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="{{ $voiture->photo }}"
              class="object-center object-contain w-full">
            <span class="text-lg font-bold font-montserrat text-center">{{ $voiture->modele }}</span>

            <div class="flex flex-row gap-3 font-cabin md:text-base max-md:text-xs align-center py-2">
              <span class="text-md"><img src="{{ asset('images/icons/personne.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-1"></img>{{ $voiture->nbPers }}</span>
              <span class="text-md"><img src="{{ asset('images/icons/transmission.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-1"></img>{{ $voiture->transmission }}</span>
              <span class="text-md"><img src="{{ asset('images/icons/identity-card.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-1"></img>{{ $voiture->minAge }}</span>
              @if( $voiture->climatisation == true )
              <span class="text-md"><img src="{{ asset('images/icons/climatisation.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-1"></img>Climatisation</span>
              @endif
            </div>
            @endif
          </div>

          <div class="w-full bg-white font-montserrat p-4 pr-0 max-md:px-0 my-auto">
            <p class="text-lg font-bold ">Départ & retour</p>
            <div class="flex flex-col align-center border rounded shadow">
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
      <div class="flex flex-col w-full pt-6 border border-darkBlue border-opacity-50 rounded-lg bg-white mt-10">
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

      <div class="flex flex-col w-full p-5 border border-darkBlue border-opacity-50 rounded-lg bg-white my-10 shadow-inner shadow-teal-600">
        <div class="flex flex-row justify-between text-3xl">
          <p class="font-montserrat font-bold">Total</p>
          <p class="text-teal-600 font-montserrat font-bold">{{ ($voiture->prix * $nbJrs) + $prixPrtc + $prixOptns }} DH</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Conducteur --}}
  <section class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto pt-6 px-3 ">

      <div class="flex flex-row justify-between max-sm:flex-col max-sm:justify-center max-sm:text-center">
        <p class="text-2xl font-bold font-montserrat pb-6">Détails du conducteur</p>
        <p class="text-base font-cabin">*Champ Obligatoire</p>
      </div>

      <form wire:submit.prevent="validerConducteur"
        class="grid grid-cols-2 max-sm:grid-cols-1 gap-8 justify-center align-center max-w-4xl mx-auto font-montserrat md:p-7 max-md:p-3 rounded">
        @csrf
        <label for="prenomConducteur" class="flex flex-col gap-1 font-semibold">Prénom *
          <input type="text" wire:model="prenomConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-300 font-normal border-2 placeholder-gray-300 shadow">
          @error('prenomConducteur') <p class="text-red-500 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="nomConducteur" class="flex flex-col gap-1 font-semibold">Nom *
          <input type="text" wire:model="nomConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-300 font-normal border-2 placeholder-gray-300 shadow">
          @error('nomConducteur') <p class="text-red-500 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="dateNsConducteur" class="flex flex-col gap-1 font-semibold">Date de naissance *
          <input type="date" wire:model="dateNsConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-300 font-normal border-2 placeholder-gray-300 shadow">
          @error('dateNsConducteur') <p class="text-red-500 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="emailConducteur" class="flex flex-col gap-1 font-semibold">Email *
          <input type="email" wire:model="emailConducteur"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-300 font-normal border-2 placeholder-gray-300 shadow">
          @error('emailConducteur') <p class="text-red-500 text-sm p-1">{{ $message }}</p>@enderror
        </label>
        <label for="numTelConducteur" class="col-span-2 flex flex-col gap-1 font-semibold sm:w-80 max-sm:w-full max-sm:col-span-1 mx-auto">
          <p class="font-semibold">Numéro de téléphone * <i class="text-teal-600">(Maroc)</i></p>
          <input type="tel" pattern="[0-9]{10}" wire:model="numTelConducteur" placeholder="06XXXXXXXX"
            class="focus:ring-0 focus:border-teal-400 rounded-lg border-slate-300 font-normal border-2 placeholder-gray-300 shadow">
          @error('numTelConducteur') <p class="text-red-500 text-sm p-1">{{ $message }}</p>@enderror
        </label>

    </div>

  </section>

    {{-- Chargement --}}
 <section wire:loading class="fixed z-20 inset-0 bg-white bg-opacity-90 transition-all">
    <div class="w-full h-screen flex flex-col justify-center place-items-center">
        <span class="loading loading-spinner loading-lg text-teal-600"></span>
          <p class="mt-2 font-semibold text-lg">Chargement...</p>
    </div>
 </section>

  {{-- Paiement --}}
  <section class="w-full bg-slate-200">
    <div class="max-w-7xl mx-auto sm:py-8 sm:px-3 max-sm:px-4 max-sm:py-8">

      <p class="text-2xl font-bold font-montserrat pb-8 max-sm:text-center">Modes de paiement</p>

      <div class="flex flex-col w-full md:flex-row">
        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center font-montserrat h-full max-w-lg mx-auto">
          {{-- Paiement à l'agence --}}
          <div class="w-full border p-3 bg-white border-mediumBlue rounded-lg shadow-xl flex flex-col justify-center gap-4 align-center ">
            <p class="text-xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-teal-600">
              Paiement à l'agence</p>
            <p class="font-cabin text-lg p-3 pb-6 text-justify">Si vous préférez régler votre location directement à notre agence, notre équipe sera ravie de vous assister.<br>Bien que vous ne bénéficiez pas de la réduction de 
              <b class="text-teal-600">5%</b>, vous profiterez d'un service personnalisé et de notre assistance sur place.</p>
            <button type="submit"
              class="font-semibold text-white bg-gradient-to-r from-teal-500 via-teal-400 to-cyan-500 rounded-lg shadow py-3 px-6 w-fit mx-auto">
              Payer À L'agence
            </button>
            @if( session('success'))
              <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success')}}</span>
              </div>
            @endif

          </div>
        </div>
      </form>

        <div class="divider md:divider-horizontal font-montserrat">Ou</div>

        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center font-montserrat h-full max-w-lg mx-auto">
          {{-- Paiement via Stripe --}}
          <div class="w-full border p-3 bg-white border-mediumBlue rounded-lg shadow-xl flex flex-col justify-center gap-4 align-center ">
            <p class="text-xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-stripe">
              Paiement en ligne via <img class="inline w-14 p-0" src="{{ asset('images/icons/stripe.svg')}}" /></p>
            <p class="font-cabin text-lg p-3 pb-6 text-justify">Optez pour le règlement en ligne de votre location et
              bénéficiez d'une remise immédiate de <b class="text-teal-600">5%</b>.<br>Cette méthode garantit la
              disponibilité du véhicule et offre la possibilité de remboursement en cas de besoin.</p>

            <form action="{{ route('checkout',['dateDepart'=>$dateDepart,'dateRetour'=>$dateRetour,'voiture'=>$voiture->slug])}}" method="post" class="w-full flex justify-center align-center">
              @csrf
              <button
                class="font-semibold text-white bg-gradient-to-r from-indigo-600 via-stripe to-purple-600 rounded-lg shadow py-3 px-6 w-fit mx-auto">
                Payer En Ligne
              </button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</article>



