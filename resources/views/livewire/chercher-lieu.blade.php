<div class="col-span-2 flex flex-row max-sm:flex-col">

    <label for="lieuDepart">
        <input name="lieuDepart"  type="text" placeholder="Lieu de départ" wire:model.live="lieuDepart"
        class="relative w-full p-3 cursor-pointer border border-mediumBlue max-lg:rounded-lg text-sm lg:rounded-l-xl">

            @if ( isset($lieuxDepart))
                <div class="absolute z-10 w-80 mt-2 bg-white rounded shadow-md text-sm">
                    @foreach ($lieuxDepart as $lieu)
                        <option value="{{ $lieu->id }}" class="border-x border-b truncate px-4 py-2 cursor-pointer hover:bg-gray-100">{{ $lieu->nom }}</option>
                    @endforeach
                </div>
            @endif

        @error('lieuDepart') <p class="text-red-600 text-xs p-2">{{ $message }}</p>
         @enderror
        
    </label>
      <label for="lieuRetour">
        <input name="lieuRetour"  type="text" placeholder="Lieu de retour" wire:model.live="lieuRetour"
        class="relative w-full p-3 cursor-pointer border border-mediumBlue max-lg:rounded-lg lg:border-l-0 text-sm">

            @if ( isset($lieuxRetour))
                <div class="absolute z-10 w-64 mt-2 bg-white rounded shadow-md text-sm">
                    @foreach ($lieuxRetour as $lieu)
                        <option value="{{ $lieu->id }}" class="border-x border-b truncate px-4 py-2 cursor-pointer hover:bg-gray-100">{{ $lieu->nom }}</option>
                    @endforeach
                </div>
            @endif

        @error('lieuRetour') <p class="text-red-600 text-xs p-2">{{ $message }}</p> @enderror
    </label>


    {{-- Example --}}
    {{-- <div class="w-full bg-slate-100">
        <div class=" max-w-3xl mx-auto justify-center align-center flex flex-col p-4">
            <input type="text" name="lieuDepart" wire:model.live="lieu"
             list="suggestions-liste" autocomplete="off">
            @if ( isset($lieux))
                <div class=" bg-white font-cabin flex flex-col">
                    @foreach ($lieux as $lieu)
                        <option value="{{ $lieu->id }}"
                            class="p-2 bg-white font-cabin hover:bg-teal-100">{{ $lieu->nom . $lieu->ville }}</option>
                    @endforeach
                </div>
            @endif
        </div>
    </div> --}}

</div>


