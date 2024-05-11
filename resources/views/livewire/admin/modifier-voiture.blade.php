<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="max-w-2xl mx-auto flex flex-col gap-3 py-4 px-3">
        <div class="w-full flex justify-start py-2">
            <a wire:navigate href="{{ route('adminCars')}}" class="py-2 px-4 rounded-full bg-gradient-to-r from-mediumBlue to-lightBlue hover:saturate-150 transition shadow-lg text-white font-semibold"><i class="ri-arrow-left-line mr-3"></i>Retour</a>
        </div>

        <p class="pb-2 text-center text-xl font-semibold font-montserrat text-mediumBlue">Modifier les détails du voiture</p>

        {{-- Succès & Erreur --}}
        @if (session()->has('success'))
            <div role="alert" class="alert alert-success font-cabin py-3 my-3 w-fit mx-auto z-20"   x-data="{ show: true }"    x-init="setTimeout(() => { show = false }, 50000)"   x-show="show"  @click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div role="alert" class="alert alert-error font-cabin py-3 my-3 w-fit mx-auto z-20" x-data="{ show: true }"  x-init="setTimeout(() => { show = false }, 50000)" x-show="show"    @click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="ModifierVoiture" enctype="multipart/form-data" class="max-w-2xl mx-auto grid grid-cols-2 max-sm:grid-cols-1 md:gap-4 max-md:gap-2 p-4">
            @csrf   
            <label for="modele"><p class="text-base font-bold text-mediumBlue">Modèle :</p>
                <input type="text" wire:model="modele" value="{{ $modele }}"
                class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                @error('modele') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror   
            </label> 
            <label for="prix"><p class="text-base font-bold text-mediumBlue">Prix :</p>
                <input type="number" min="0" step=".01" wire:model="prix" value="{{ $prix }}"
                class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                @error('prix') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>

            <label for="moteur"><p class="text-base font-bold text-mediumBlue">Moteur :</p>
                <select name="moteur" wire:model="moteur"  value="{{ $moteur }}"
                        class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Electrique">Électrique</option>
                    <option value="Gasoil">Gasoil</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybride">Hybride</option>
                </select>
                @error('moteur') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>

            <label for="transmission"><p class="text-base font-bold text-mediumBlue">Transmission :</p>
                <select name="transmission" wire:model="transmission"  value="{{ $transmission }}"
                        class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Auto">Auto</option>
                    <option value="Manuelle">Manuelle</option>
                </select>
                @error('transmission') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <div class="w-full flex flex-col">
                <p class=" text-mediumBlue font-semibold">Photo Actuelle :</p>
                <img src="{{ asset('images/voitures/'.$photoModify)}}" 
                alt="{{ asset('images/voitures/'.$photoModify)}}"
                class="object-contain object-center rounded  my-2">

            </div>
            <label for="photo"><p class="text-base font-bold text-mediumBlue">Nouvelle photo :</p>
                <input type="file" accept="image/png, image/jpeg" wire:model="photo" value="{{ $photo }}"
                        class="file:text-white file:bg-mediumBlue file:border-none file:font-cabin hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 w-full shadow focus:ring-mediumBlue p-1 focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                @error('photo') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror 
            </label>
            <label for="ville"><p class="text-base font-bold text-mediumBlue">Ville :</p>
                <input type="text" wire:model="ville"  value="{{ $ville }}"
                        class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                @error('ville') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="nbPers"><p class="text-base font-bold text-mediumBlue">Nombre de personnes :</p>
                <input type="number" min="0" wire:model="nbPers" value="{{ $nbPers }}"
                        class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                @error('nbPers') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="minAge"><p class="text-base font-bold text-mediumBlue">Âge minimum :</p>
                <input type="number" min="0" max="100" wire:model="minAge" value="{{ $minAge }}"
                    class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                @error('minAge') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="climatisation"><p class="text-base font-bold text-mediumBlue">Climatisation :</p>
                <select name="climatisation" wire:model="climatisation" value="{{ $climatisation }}"
                 class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Oui" selected>Oui</option>
                    <option value="Non">Non</option>
                </select>                
                @error('climatisation') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="description" class="sm:col-span-2"><p class="text-base font-bold text-mediumBlue">Description:</p>
                <textarea  rows="4" wire:model="description"  value="{{ $description }}"
                        class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition"></textarea>
                @error('description') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <button type="submit" class="sm:col-span-2 text-white bg-gradient-to-r from-lightBlue to-mediumBlue rounded-lg shadow-lg w-full font-cabin font-semibold uppercase py-2 hover:saturate-150 mt-3">Enregistrer</button>
        </form>

    </div>

</div>
