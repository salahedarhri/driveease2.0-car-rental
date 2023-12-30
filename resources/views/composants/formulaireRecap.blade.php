<div class="grid grid-cols-3 max-sm:grid-cols-1 max-w-4xl mx-auto font-cabin my-4 border border-sky-500 rounded-lg bg-sky-300 bg-opacity-40">

  <div class="flex flex-col align-center max-sm:text-center p-4">
    <p class="font-bold text-sky-600 text-center">Lieu et Date <i class="ri-calendar-line text-xl ml-2"></i></p>
    <p>Lieu de départ: @if(isset($lieuDepart)) {{ $lieuDepart }} @else - @endif</p> 
    <p>Lieu de retour: @if(isset($lieuRetour)) {{ $lieuRetour }} @else - @endif</p> 
    <p>De: @if(isset($dateDepartDt)) {{ $dateDepartDt }} @else - @endif</p> 
    <p>à: @if(isset($dateRetourDt)) {{ $dateRetourDt }} @else - @endif</p> 
  </div>

  <div class="flex flex-col align-center max-sm:text-center p-4 sm:border-x max-sm:border-y border-sky-400">
    <p class="font-bold text-sky-600 text-center">Voiture <i class="ri-roadster-fill text-xl ml-2"></i></p>
    @if(isset($voiture)) 
      <p>Modèle : {{ $voiture->modele }}</p>
      <p>Prix : {{ $voiture->prix }}</p>
      <p>Nbre Pers : {{ $voiture->nbPers }}</p>
    @else
      <p>Veuillez choisir un véhicule</p>
    @endif
  </div>

  <div class="flex flex-col align-center max-sm:text-center p-4">
    <p class="font-bold text-sky-600 text-center">Protection & Autres <i class="ri-shield-line text-xl ml-2"></i></p>
    @if( isset($protection))

    @else
      <p>Vous pourrez choisir votre protection et vos options après avoir sélectionné votre véhicule</p>  
    @endif

  </div>

</div>