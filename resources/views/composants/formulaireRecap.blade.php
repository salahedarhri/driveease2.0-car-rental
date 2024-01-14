<div class="grid grid-cols-3 max-sm:grid-cols-1 max-w-4xl mx-auto font-cabin my-2 rounded-lg bg-white shadow-lg">

  {{-- Date et Lieu --}}
  <div class="flex flex-col align-center max-sm:text-center p-4">

    <p class="font-bold text-cyan-600 text-center font-montserrat p-1">Lieu et Date<i class="ri-calendar-line font-normal text-2xl pl-2"></i></p>
    <div class="p-1">
      <p class="font-semibold font-montserrat ">Départ</p>          
      <p>@if(isset($lieuDepart)) {{ $lieuDepart }} @else - @endif</p> 
      <p>Le @if(isset($dateDepartDt)) {{ $dateDepartDt }} @else - @endif</p> 
    </div>

    <div class="p-1">
      <p class="font-semibold font-montserrat ">Retour</p>
      <p>@if(isset($lieuRetour)) {{ $lieuRetour }} @else - @endif</p> 
      <p>Le @if(isset($dateRetourDt)) {{ $dateRetourDt }} @else - @endif</p> 
    </div>

  </div>

  {{-- Voiture --}}
  <div class="flex flex-col align-center max-sm:text-center p-4 sm:border-x max-sm:border-y border-opacity-40 border-slate-300">
    <p class="font-bold text-cyan-600 text-center font-montserrat p-1">Voiture<i class="ri-roadster-fill font-normal text-2xl pl-2"></i></p>
    
    @if(isset($voiture)) 
      <p class="font-semibold font-montserrat">{{ $voiture->modele }}</p>
      <p>{{ $voiture->prix }} DH/Jour</p>
      <p class="py-2 font-semibold font-montserrat text-teal-600">Total &nbsp; {{ $voiture->prix * $nbJrs }} DH</p>
    @else
      <p>Veuillez choisir un véhicule</p>
    @endif

  </div>

  {{-- Franchise --}}
  <div class="flex flex-col align-center max-sm:text-center p-4">
    <p class="font-bold text-cyan-600 text-center font-montserrat p-1">Assurance<i class="ri-shield-line font-normal text-2xl pl-2"></i></p>
    
    @if( isset($protection))
      <p class="font-semibold font-montserrat">Franchise {{ $protection->type }}</p>
    @else
      <p>Vous pourrez choisir votre protection et vos options après avoir sélectionné votre véhicule</p>  
    @endif

  </div>

</div>