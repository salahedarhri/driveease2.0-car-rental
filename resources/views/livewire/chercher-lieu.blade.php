<div class="flex flex-row max-sm:flex-col w-full max-lg:gap-2">

    {{-- Lieu de Départ --}}
    <label for="lieuDepart" class="w-full" x-data="{ lieuDepart:''}">

        <input name="lieuDepart" type="text" placeholder="Lieu de départ" wire:model.live.debounce.100ms="lieuDepart" autocomplete="off" x-model="lieuDepart"
                class="relative w-full p-3 cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:rounded-l-xl">

        @if ( count($lieuxDepart) > 0 )
            <div class="absolute z-10 mt-1 w-80 bg-white rounded shadow-xl p-2 font-cabin">

                <div wire:loading wire:target="lieuDepart" class="p-2"><p class="text-sm">Chargement...</p></div>
                    @if( $lieuxDepart->where('type','Aéroport')->isNotEmpty())
                        <p wire:loading.remove wire:target="lieuDepart" class=" text-teal-600 underline text-sm">Aéroports : </p>
                        <div wire:loading.remove wire:target="lieuDepart">
                            @foreach ($lieuxDepart->where('type','Aéroport') as $lieu)
                                <p wire:loading.remove wire:click="appliquerLieuDepart('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                    class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100">
                                    <i class="font-normal ri-plane-line text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                            @endforeach
                        </div>

                    @endif
                    @if( $lieuxDepart->where('type','Gare Routière')->isNotEmpty())
                        <p wire:loading.remove wire:target="lieuDepart" class=" text-teal-600 underline text-sm">Stations : </p>
                        <div wire:loading.remove wire:target="lieuDepart">
                            @foreach ($lieuxDepart->where('type','Gare Routière') as $lieu)
                                <p  wire:click="appliquerLieuDepart('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                    class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100">
                                    <i class="font-normal ri-bus-fill text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                            @endforeach
                        </div>
                    @endif

            </div>
        @endif

        @error('lieuDepart') <p class="text-red-600 text-sm p-2">{{ $message }}</p>@enderror
    </label>

    {{-- Lieu de Retour --}}
    <label for="lieuRetour" class="w-full" x-data="{ lieuRetour:''}">

        <input name="lieuRetour" type="text" placeholder="Lieu de retour" wire:model.live.debounce.100ms="lieuRetour" autocomplete="off" x-model="lieuRetour"
                class="relative w-full p-3 cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:border-l-0">
                
        @if ( count($lieuxRetour) > 0 )
            <div class="absolute z-10 w-80 mt-1 bg-white rounded shadow-md p-2 font-cabin">

                <div wire:loading wire:target="lieuRetour" class="p-2"><p class="text-sm">Chargement...</p></div>

                    @if( $lieuxRetour->where('type','Aéroport')->isNotEmpty())
                        <p wire:loading.remove wire:target="lieuRetour" class=" text-teal-600 underline text-sm">Aéroports :</p>
                        <div wire:loading.remove wire:target="lieuRetour">
                            @foreach ($lieuxRetour->where('type','Aéroport') as $lieu)
                                <p wire:loading.remove wire:click="appliquerLieuRetour('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                    class="truncate px-4 py-2 cursor-pointer hover:bg-teal-100">
                                    <i class="font-normal ri-plane-line text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if( $lieuxRetour->where('type','Gare Routière')->isNotEmpty())
                        <p wire:loading.remove wire:target="lieuRetour" class=" text-teal-600 underline text-sm ">Stations : </p>
                        <div wire:loading.remove wire:target="lieuRetour">
                            @foreach ($lieuxRetour->where('type','Gare Routière') as $lieu)
                                <p wire:loading.remove wire:click="appliquerLieuRetour('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                    class="truncate px-4 py-2 cursor-pointer hover:bg-teal-100">
                                    <i class="font-normal ri-bus-fill text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                            @endforeach
                        </div>
                    @endif

            </div>
        @endif

        @error('lieuRetour') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
    </label>

</div>


