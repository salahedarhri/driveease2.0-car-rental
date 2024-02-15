<div>
  @include('composants.formulaireRecap')

  {{-- Titre + total --}}
  <div id="navbar-total" class="w-full bg-white shadow-xl">
    <div
      class="flex flex-row justify-between max-md:justify-center place-items-center max-w-5xl mx-auto p-2 px-3 font-montserrat ">
      <p class="text-xl max-md:hidden font-semibold">Récapitulatif de votre réservation</p>

      <div class="flex flex-row place-items-center  gap-6 text-lg p-2">
        @if(isset($voiture) && isset($protectionChoisi) && isset($optnsIds))
        <div class="flex flex-row gap-1">
          <p class="font-semibold">Total : </p>
          <p class="font-semibold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc + $prixOptns }} Dh</p>
        </div>
        @elseif( isset($voiture) && isset($protectionChoisi))
        <div class="flex flex-row gap-1">
          <p class="font-semibold">Total :</p>
          <p class="font-semibold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prixPrtc }} Dh</p>
        </div>
        @else
        <p> ---- </p>
        @endif

      </div>
    </div>

  </div>

  <div class="w-full bg-slate-200">
    <div class="max-w-5xl mx-auto p-4">

      <p class="text-xl font-bold font-montserrat pb-4">Résumé</p>

      {{-- Section Voiture --}}
      <div class="flex flex-col w-full p-4 border border-darkBlue border-opacity-50 rounded-lg bg-white">
        <div class="w-full flex flex-row justify-between text-xl max-sm:text-base px-3">
          <p class="font-bold font-montserrat">Voiture</p>
          <p class="font-bold font-montserrat">@if( isset($voiture)){{ $voiture->prix * $nbJrs }} DH @else---@endif</p>
        </div>

        <div class="w-full grid grid-cols-2 max-md:grid-cols-1 py-4">

          <div class="w-full bg-slate-100 p-4">
            @if( isset($voiture))
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="Car Image"
              srcset="aspect-square object-center object-contain">
            <p class="text-lg font-bold font-montserrat pl-4 py-4">{{ $voiture->modele }}</p>

            <div class="flex flex-row gap-4 font-cabin max-md:text-sm align-middle">
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

          <div class="w-full bg-white font-montserrat p-4 pr-0 max-md:px-0 my-auto">
            <p class="text-lg font-bold ">Départ & retour</p>
            <div class="flex flex-col align-center border rounded">
              <div class="border-b-2 border-darkBlue border-opacity-30 bg-slate-100 p-3">
                <p class="font-bold text-sm py-2">Départ</p>
                <p class="font-cabin">{{ $dateDepartDt }}</p>
                <p class="font-cabin">{{ $lieuDepart }}</p>
              </div>
              <div class="bg-slate-100 p-3">
                <p class="font-bold text-sm py-2">Retour</p>
                <p class="font-cabin">{{ $dateRetourDt }}</p>
                <p class="font-cabin">{{ $lieuRetour }}</p>
              </div>

            </div>
          </div>
        </div>
      </div>

      {{-- Section Protection & Options --}}
      <div class="flex flex-col w-full p-4 border border-darkBlue border-opacity-50 rounded-lg bg-white mt-4">
        <div class="w-full flex flex-row justify-between text-xl max-sm:text-base px-3">
          <p class="font-bold font-montserrat">Protection & Options</p>
          <p class="font-bold font-montserrat">@if( isset($prtcChoisi)){{ $prixPrtc + $prixOptns }} DH @else---@endif
          </p>
        </div>

        <div class="w-full flex flex-col pt-4">
          <div class="flex flex-row justify-between align-center font-cabin px-4 py-3 border-b">
            <p class="w-1-3 ">{{ $prtcChoisi->type }}</p>
            <p class="w-1-3 text-center">Pour {{ $nbJrs }} Jour(s)</p>
            <p class="w-1-3 font-bold text-right">{{ $prixPrtc }} DH</p>
          </div>

          @if( $options != null )

          @foreach ($options as $optn)

          <div class="flex flex-row justify-between align-center font-cabin px-4 py-3 border-b">
            <p class="w-1/3">{{ $optn->option }}</p>
            <p class="w-1/3 text-center">Pour {{ $nbJrs }} Jour(s)</p>
            <p class="w-1/3 font-bold text-right">{{ $optn->prix }} DH</p>
          </div>

          @endforeach

          @endif

        </div>
      </div>

    </div>
  </div>

</div>