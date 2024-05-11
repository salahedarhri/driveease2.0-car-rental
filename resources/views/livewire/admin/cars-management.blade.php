<div x-data="{ openModal:false, openDisplay:false, imageChoisi:'' }">
  {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  <p class="text-lg max-md:text-md text-mediumBlue p-3 mt-3 font-montserrat font-semibold">Liste des voitures</p>

  <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-3 justify-between place-items-center p-3 mt-2 font-cabin">
    <input type="text" wire:model.live.debounce.400ms="search" placeholder="Rechercher par modèle" class="rounded-xl shadow-sm focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue  placeholder-slate-400 transition">
    <button @click="openModal=!openModal" class="text-white bg-mediumBlue hover:saturate-150 transition rounded py-1 px-3 flex flex-row place-items-center gap-2">
      <i class="ri-add-circle-line text-2xl"></i>
      <p class="font-montserrat font-semibold">Ajouter une voiture</p>
    </button>
  </div>

  {{-- Alerte pour Suppression --}}
  @if (session()->has('success'))
    <div role="alert" class="alert alert-success font-cabin py-3 my-3 w-fit mx-auto z-20"                 
          x-data="{ show: true }"
          x-init="setTimeout(() => { show = false }, 50000)"
          x-show="show"
          @click="show = false">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
    </div>
  @endif
  @if (session()->has('error'))
    <div role="alert" class="alert alert-error font-cabin py-3 my-3 w-fit mx-auto z-20"                 
          x-data="{ show: true }"
          x-init="setTimeout(() => { show = false }, 50000)"
          x-show="show"
          @click="show = false">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('error') }}</span>
    </div>
  @endif

  <div x-cloak x-show="openModal">
    {{-- Modal associé au création du Bijou --}}
    @include('composants.modalCarAdd')
  </div>

  <div x-cloak x-show="openDisplay">
      {{-- Modal associé au photos du Voiture --}}
      @include('composants.modalCarDisplay')
  </div>
  

  {{-- Table --}}
  <div class="overflow-x-auto border border-slate-400 rounded-lg py-1 m-2">
    <table class="table md:table-sm max-md:table-xs md:px-1">

      <thead class="text-lightBlue">
        <tr class="border-b-slate-300 text-center">
          <th class="text-center">Photo</th>
          <th class="cursor-pointer" wire:click="sortBy('modele')">Modèle @if($ordreVariable =='modele' && $ordre == 'asc') &#11205; @elseif($ordreVariable == 'modele' && $ordre == 'desc') &#11206; @else &#11032; @endif</th>
          <th class="cursor-pointer" wire:click="sortBy('prix')">Prix(Jour) @if($ordreVariable =='prix' && $ordre == 'asc') &#11205; @elseif($ordreVariable == 'prix' && $ordre == 'desc') &#11206; @else &#11032; @endif</th>
          <th>Boîte</th>
          <th>Clim.</th>
          <th class="cursor-pointer max-md:hidden" wire:click="sortBy('nbPers')">Nbre Pers.@if($ordreVariable =='nbPers' && $ordre == 'asc') &#11205; @elseif($ordreVariable == 'nbPers' && $ordre == 'desc') &#11206; @else &#11032; @endif</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody >

        @foreach($voitures as $voiture)
          <tr class="border-b-slate-300 hover:bg-sky-100">
            <td class="">
              <div class="w-full h-full avatar flex items-center justify-center" @click="openDisplay=true; imageChoisi='{{ asset('images/voitures/'.$voiture->photo ) }}' ">
                <div class="mask h-8 w-14"><img class="object-contain" src="{{ asset('images/voitures/'.$voiture->photo ) }}" alt="car image"/></div></div></td>
            <td> {{ $voiture->modele }} </td>
            <td class="text-center"> {{ $voiture->prix }} Dh</td>
            <td class="text-center"> {{ $voiture->transmission }} </td>
            <td class="text-center"> {{ $voiture->climatisation ? 'Oui' : 'Non'}} </td>
            <td class="max-md:hidden text-center">{{ $voiture->nbPers}}</td>
            <td class="flex flex-row max-sm:flex-col justify-center align-center place-items-center text-center gap-6 max-sm:gap-2 max-sm:py-2"> 
              <a wire:navigate href="{{ route('manageCar',[ 'id' => $voiture->id ])}}">
                <i class="ri-edit-line text-white bg-mediumBlue hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
              </a>
              <button wire:click="SupprimerVoiture({{ $voiture->id }})" wire:key="voiture-{{$voiture->slug}}"
                wire:confirm="Voulez-vous vraiment supprimer la voiture {{$voiture->modele}} ?">
                <i class="ri-close-line text-white bg-red-700 hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
              </button>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <div class="mt-4 p-4">
    {{$voitures->links()}}
  </div>
    
</div>
