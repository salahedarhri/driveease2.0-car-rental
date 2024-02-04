<div class="col-span-2 flex flex-row max-sm:flex-col w-full">

    {{-- Lieu de Départ --}}
    <label for="lieuDepart" class="w-full" x-data="{ lieuDepart:''}">

        <input name="lieuDepart" type="text" placeholder="Lieu de départ" wire:model.live="lieuDepart" autocomplete="off" x-model="lieuDepart"
                class="relative w-full p-3 cursor-pointer border border-mediumBlue max-lg:rounded-lg text-sm lg:rounded-l-xl">

        @if ( count($lieuxDepart) > 0 || $loading == true  )
            <div class="absolute z-10 w-96 mt-2 bg-white rounded shadow-xl p-2 font-cabin">

                <div wire:loading wire:target="lieuDepart" class="p-2"><p class="text-sm">Chargement...</p></div>
                @if( $loading == false )
                    @if( $lieuxDepart->where('type','Airport')->isNotEmpty())
                        <p class=" text-teal-600 underline ">Aéroports : </p>
                        @foreach ($lieuxDepart->where('type','Airport') as $lieu)
                            <p wire:click="appliquerLieuDepart('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100"><i class="ri-plane-line text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                        @endforeach
                    @endif
                    @if( $lieuxDepart->where('type','Bus Station')->isNotEmpty())
                        <p class=" text-teal-600 underline ">Stations : </p>
                        @foreach ($lieuxDepart->where('type','Bus Station') as $lieu)
                            <p wire:click="appliquerLieuDepart('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100"><i class="ri-bus-fill text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}</p>
                        @endforeach
                    @endif
                @endif

            </div>
        @endif

        @error('lieuDepart') <p class="text-red-600 text-xs p-2">{{ $message }}</p>@enderror
    </label>

    {{-- Lieu de Retour --}}
    <label for="lieuRetour" class="w-full" x-data="{ lieuRetour:''}">

        <input name="lieuRetour" type="text" placeholder="Lieu de retour" wire:model.live="lieuRetour" autocomplete="off" x-model="lieuRetour"
                class="relative w-full p-3 cursor-pointer border border-mediumBlue max-lg:rounded-lg lg:border-l-0 text-sm">

        @if ( count($lieuxRetour) > 0 || $loading == true  )
            <div class="absolute z-10 w-96 mt-2 bg-white rounded shadow-md text-sm p-2">

                <div wire:loading wire:target="lieuRetour" class="p-2"><p class="text-sm">Chargement...</p></div>
                @if( $loading == false )
                    @if( $lieuxRetour->where('type','Airport')->isNotEmpty())
                        <p>Aéroports : </p>
                        @foreach ($lieuxRetour->where('type','Airport') as $lieu)
                            <p wire:click="appliquerLieuRetour('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                class="truncate px-4 py-2 cursor-pointer hover:bg-gray-100">{{ $lieu->nom }}</p>
                        @endforeach
                    @endif
                    @if( $lieuxRetour->where('type','Bus Station')->isNotEmpty())
                        <p>Stations : </p>
                        @foreach ($lieuxRetour->where('type','Bus Station') as $lieu)
                            <p wire:click="appliquerLieuRetour('{{ $lieu->nom }}','{{ $lieu->id }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                class="truncate px-4 py-2 cursor-pointer hover:bg-gray-100">{{ $lieu->nom }}</p>
                        @endforeach
                    @endif
                @endif

            </div>
        @endif

        @error('lieuRetour') <p class="text-red-600 text-xs p-2">{{ $message }}</p> @enderror
    </label>

</div>


