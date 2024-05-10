<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModal=false" class="w-fit max-md:w-full bg-white shadow-lg rounded-b-xl border-t-2 border-cyan-400 p-2 font-cabin">

        <div class="w-full flex justify-end p-1">
            <button @click="openModal=false" ><i class="ri-close-line text-2xl hover:bg-cyan-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-2 text-center text-xl font-semibold text-mediumBlue">Ajouter un bijou</p>

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

        <form wire:submit="AjouterVoiture" enctype="multipart/form-data" class="max-w-2xl mx-auto grid grid-cols-2 max-sm:grid-cols-1 md:gap-4 p-4">
            @csrf   
            <label for="modele"><p class="text-base font-bold text-mediumBlue">Modèle :</p>
                <input type="text" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="modele">
                @error('modele') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror   
            </label> 
            <label for="prix"><p class="text-base font-bold text-mediumBlue">Prix :</p>
                <input type="number" min="0" step=".01" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="prix">
                @error('prix') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>

            <label for="moteur"><p class="text-base font-bold text-mediumBlue">Moteur :</p>
                <select name="moteur" wire:model="moteur" class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Electrique">Électrique</option>
                    <option value="Gasoil">Gasoil</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybride">Hybride</option>
                </select>
                @error('moteur') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>

            <label for="transmission"><p class="text-base font-bold text-mediumBlue">Transmission :</p>
                <select name="transmission" wire:model="transmission" class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Auto">Auto</option>
                    <option value="Manuelle">Manuelle</option>
                </select>
                @error('transmission') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="photo"><p class="text-base font-bold text-mediumBlue">Photo :</p>
                <input type="file" accept="image/png, image/jpeg" class="file:text-white file:bg-mediumBlue file:border-none file:font-cabin hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 w-full shadow focus:ring-mediumBlue p-1 focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="photo">
                @error('photo') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror 
            </label>
            <label for="ville"><p class="text-base font-bold text-mediumBlue">Ville :</p>
                <input type="text" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="ville">
                @error('ville') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="nbPers"><p class="text-base font-bold text-mediumBlue">Nombre de personnes :</p>
                <input type="number" min="0" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="nbPers">
                @error('nbPers') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="minAge"><p class="text-base font-bold text-mediumBlue">Âge minimum :</p>
                <input type="number" min="0" max="100" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" wire:model="minAge">
                @error('minAge') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="climatisation"><p class="text-base font-bold text-mediumBlue">Climatisation :</p>
                <select name="climatisation" wire:model="climatisation" class="w-full shadow focus:ring-mediumBlue select:font-cabin focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition">
                    <option value="Oui" selected>Oui</option>
                    <option value="Non">Non</option>
                </select>                
                @error('climatisation') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="description" class="sm:col-span-2"><p class="text-base font-bold text-mediumBlue">Description:</p>
                <textarea class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" rows="4" wire:model="description"></textarea>
                @error('description') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <button type="submit" class="sm:col-span-2 text-white bg-gradient-to-r from-lightBlue to-mediumBlue rounded-lg shadow-lg w-full font-cabin font-semibold uppercase py-2 hover:saturate-150 mt-3">Enregistrer</button>
        </form>

    </div>
</div>