<div>
    {{-- Formulaire d'accueil --}}
    <form wire:submit="validerDonnees">
        <div class="grid lg:grid-cols-2 grid-cols-1 justify-center max-lg:gap-2">
            <div class="flex flex-row max-sm:flex-col w-full max-lg:gap-2">
                {{-- Lieu de Départ --}}
                <label for="lieuDepart" class="w-full" x-data="{ lieuDepart:''}">
                    <input name="lieuDepart" type="text" placeholder="Ville, Aéroport, Gare,..." wire:model.live.debounce.50ms="lieuDepart" autocomplete="off" x-model="lieuDepart" class="relative w-full p-3 cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:rounded-l-xl">
                    
                    {{-- Suggestions Départ --}}
                    @if( $indicDepart && $lieuDepart != null )
                        <div class="absolute z-30 mt-1 w-80 bg-white rounded shadow-xl p-2 font-cabin">
                            <p class="text-sm p-2">Pas de résultats.</p>
                        </div>
                    @elseif ( !empty($lieuxDepart) )
                        <div wire:transition class="absolute z-30 mt-1 w-80 bg-white rounded shadow-xl p-2 font-cabin">
                            
                            <div wire:loading wire:target="lieuDepart" class="p-2">
                                <p class="text-sm">Chargement...</p>
                            </div>

                            @if( $lieuxDepart->where('type','Aéroport')->isNotEmpty())
 
                                <div wire:loading.remove wire:target="lieuDepart">
                                    @foreach ($lieuxDepart->where('type','Aéroport') as $lieu)
                                        <p wire:loading.remove wire:click="appliquerLieuDepart('{{ $lieu->nom }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                            class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100"><i class="font-normal ri-plane-line text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}
                                        </p>
                                    @endforeach
                                </div>
                            @endif
                            @if( $lieuxDepart->where('type','Gare Routière')->isNotEmpty())

                                <div wire:loading.remove wire:target="lieuDepart">
                                    @foreach ($lieuxDepart->where('type','Gare Routière') as $lieu)
                                        <p wire:loading.remove wire:click="appliquerLieuDepart('{{ $lieu->nom }}')" x-on:click="lieuDepart='{{ $lieu->nom }}'"
                                            class="truncate px-2 py-2 cursor-pointer hover:bg-teal-100"><i class="font-normal ri-bus-fill text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}
                                        </p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    @error('lieuDepart')<p class="text-red-600 text-sm p-2">{{ $message }}</p>@enderror
                </label>

                {{-- Lieu de Retour --}}
                <label for="lieuRetour" class="w-full" x-data="{ lieuRetour:''}">

                    <input name="lieuRetour" type="text" placeholder="Ville, Aéroport, Gare,..."
                        wire:model.live.debounce.50ms="lieuRetour" autocomplete="off" x-model="lieuRetour"
                        class="relative w-full p-3 cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:border-l-0">

                    @if( $indicRetour && $lieuRetour != null )
                        <div class="absolute z-30 mt-1 w-80 bg-white rounded shadow-xl p-2 font-cabin">
                            <p class="text-sm p-2">Pas de résultats.</p>
                        </div>
                    @elseif( !empty($lieuxRetour))
                    <div wire:transition class="absolute z-30 w-80 mt-1 bg-white rounded shadow-md p-2 font-cabin">

                        <div wire:loading wire:target="lieuRetour" class="p-2">
                            <p class="text-md">Chargement...</p>
                        </div>

                        @if( $lieuxRetour->where('type','Aéroport')->isNotEmpty())
                            <div wire:loading.remove wire:target="lieuRetour">
                                
                                @foreach ($lieuxRetour->where('type','Aéroport') as $lieu)
                                <p wire:loading.remove wire:click="appliquerLieuRetour('{{ $lieu->nom }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                    class="truncate px-4 py-2 cursor-pointer hover:bg-teal-100"><i class="font-normal ri-plane-line text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}
                                </p>
                                @endforeach
                            </div>
                        @endif

                        @if( $lieuxRetour->where('type','Gare Routière')->isNotEmpty())
                            <div wire:loading.remove wire:target="lieuRetour">

                                @foreach ($lieuxRetour->where('type','Gare Routière') as $lieu)
                                    <p wire:loading.remove wire:click="appliquerLieuRetour('{{ $lieu->nom }}')" x-on:click="lieuRetour='{{ $lieu->nom }}'"
                                        class="truncate px-4 py-2 cursor-pointer hover:bg-teal-100"><i class="font-normal ri-bus-fill text-xl text-teal-500 mr-3"></i>{{ $lieu->nom }}
                                    </p>
                                @endforeach
                            </div>
                        @endif

                    </div>

                    @endif

                    @error('lieuRetour') <p class="text-red-600 text-sm p-2">{{ $message }}</p>@enderror
                </label>

            </div>
            <div class="flex flex-row max-sm:flex-col w-full max-lg:gap-2">
                {{-- Date de Départ --}}
                <label for="dateDepart" class="w-full">
                    <input id="dateTime1" name="dateDepart" type="text" placeholder="Date de départ"
                        wire:model.blur="dateDepart"
                        class="p-3 w-full cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:border-l-0">
                    @error('dateDepart') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
                </label>

                {{-- Date de Retour --}}
                <label for="dateRetour" class="w-full">
                    <input id="dateTime2" name="dateRetour" type="text" placeholder="Date de retour"
                        wire:model.blur="dateRetour"
                        class="p-3 w-full cursor-pointer focus:ring-0 border-2 border-slate-300 focus:border-teal-500 max-lg:rounded-lg lg:border-l-0 lg:rounded-r-xl">
                    @error('dateRetour') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
                </label>
            </div>
        </div>
        <div class="flex flex-row align-middle justify-between pt-2 text-sm mx-2">
            <div class="flex flex-row gap-2 place-items-center">
                <p>Mon age :</p>
                <select name="minAge" wire:model.blur="minAge" class="border-none focus:border-none">
                    @for($i = 18; $i <= 25; $i++) 
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    <option value="26">26+</option>
                </select>
                @error('minAge') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="px-5 py-2 bg-teal-500 hover:bg-teal-600 text-white cursor-pointer font-semibold rounded-lg shadow-md uppercase transition-all">
                Rechercher
            </button>
        </div>
    </form>

</div>