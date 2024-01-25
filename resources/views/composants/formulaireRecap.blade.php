<div class="grid grid-cols-7 max-sm:grid-cols-1 max-w-4xl mx-auto font-cabin my-2 rounded-lg bg-white shadow-lg">

  {{-- Date et Lieu --}}
  <div class="sm:col-span-2 max-sm:text-center p-2 hover:bg-slate-100 transition duration-300">
    <a href="{{ route('accueil')}}" class="flex flex-col align-center">
      <p class="font-bold text-cyan-600 text-center font-montserrat p-1">Lieu et Date<i class="ri-calendar-line font-normal text-2xl pl-2"></i></p>
      <div class="p-1 text-sm">
        <p class="font-semibold font-montserrat ">Départ</p>          
        <p>@if(isset($lieuDepart)) {{ $lieuDepart }} @else - @endif</p> 
        <p>Le @if(isset($dateDepartDt)) {{ $dateDepartDt }} @else - @endif</p> 
      </div>

      <div class="p-1 text-sm">
        <p class="font-semibold font-montserrat ">Retour</p>
        <p>@if(isset($lieuRetour)) {{ $lieuRetour }} @else - @endif</p> 
        <p>Le @if(isset($dateRetourDt)) {{ $dateRetourDt }} @else - @endif</p> 
      </div>
    </a>
  </div>

  {{-- Voiture --}}
  <div class="sm:col-span-2 p-2 sm:border-x max-sm:border-y border-opacity-50 border-slate-300 hover:bg-slate-100 transition duration-300">
    <p class="font-bold text-cyan-600 text-center font-montserrat p-1">Voiture<i class="ri-roadster-fill font-normal text-2xl pl-2"></i></p>   
    @if(isset($voiture)) 
      <form action="{{ route('voituresDisponibles')}}" method="post" class="flex flex-col align-center">
        @csrf
          <input type="hidden" name="dateDepart" value="{{ $dateDepart }}">
          <input type="hidden" name="dateRetour" value="{{ $dateRetour }}">
          <input type="hidden" name="lieuDepart" value="{{ $lieuDepart }}">
          <input type="hidden" name="lieuRetour" value="{{ $lieuRetour }}">
          <input type="hidden" name="minAge" value="{{ $minAge }}"> 

        <button type="submit">
          <div class="flex flex-col justify-center align-center gap-1 text-center font-montserrat text-sm">
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="Car Image" class="h-20 w-auto object-center object-contain">
            <p class="text-base">{{ $voiture->modele }}</p>
            <p>{{ $nbJrs }} Jours</p>
            <p class="font-semibold text-teal-600">{{ $voiture->prix * $nbJrs }} DH</p>
          </div>
        </button>
      </form>
    @else
      <p class="font-cabin text-center">Aucune véhicule choisie pour le moment.<br>Veuillez choisir un véhicule</p>
    @endif
  </div>

  {{-- Franchise --}}
  <div class="sm:col-span-2 flex flex-col align-center text-center p-2 sm:border-r max-sm:border-b border-opacity-50 border-slate-300 font-montserrat hover:bg-slate-100 transition duration-300">
    <p class="font-bold text-cyan-600 text-center p-1">Assurance<i class="ri-shield-line font-normal text-2xl pl-2"></i></p>

    <div class="flex flex-row max-md:flex-col justify-between align-center p-2 text-sm max-md:gap-4">

      @if( isset($protectionChoisi))
        <div class="text-left max-md:text-center">
          <p class="text-base">{{ $protectionChoisi->type }}</p>
          <p class="font-semibold  text-teal-600">{{ $prix_prtc }} Dh</p>
        </div>

        @if( isset($optnIdArray))
        <div class="text-center px-2 md:border-l border-l-mediumBlue">
          <p class="">{{ count($optnIdArray) }} Options</p>
          <p class="font-semibold  text-teal-600">{{ $prix_optns }} DH</p>
        </div>
        @endif


        @else
          <p class="font-cabin text-center text-base">Vous pourrez choisir votre protection et vos options après avoir sélectionné votre véhicule</p>  
        @endif
    </div>
  </div>

  {{-- Total --}}
  <div class="flex flex-col align-center p-2 font-montserrat hover:bg-slate-100 transition duration-300 text-center text-sm">

    <p class="font-bold text-cyan-600 p-1 text-base">Résumé<i class="ri-bank-card-fill font-normal text-xl pl-2"></i></p>

    <div class="p-4">
      @if(isset($voiture) && isset($protectionChoisi) && isset($optnIdArray)) 
        <p>Total :</p>  
        <p class="font-semibold text-teal-600">{{ ($voiture->prix * $nbJrs) + $prix_prtc + $prix_optns }} Dh</p>
      @elseif( isset($voiture) && isset($protectionChoisi))    
        <p>Total :</p>
        <p class="font-semibold text-teal-600"> {{ ($voiture->prix * $nbJrs) + $prix_prtc }} Dh</p>
      @else
        <p> ---- </p>
      @endif
    </div>
  </div>

</div>