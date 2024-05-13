<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModal=false" class="w-fit max-md:w-full bg-white shadow-lg rounded-b-xl border-t-2 border-cyan-400 p-2 font-cabin max-md:overflow-y-auto max-md:my-6">

        <div class="w-full flex justify-end p-1">
            <button @click="openModal=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-2 text-center text-xl font-semibold font-montserrat text-mediumBlue">Ajouter un lieu</p>

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

        <form wire:submit.prevent="AjouterLieu" class="max-w-2xl mx-auto grid grid-cols-1 md:gap-4 max-md:gap-2 p-4">
            @csrf   
            <label for="nom" class="w-full"><p class="text-base font-bold text-mediumBlue">Description:</p>
                <input type="text" wire:model="nom"
                class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                @error('nom') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="ville"><p class="text-base font-bold text-mediumBlue">Ville :</p>
                <input type="text" wire:model="ville"
                class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                @error('ville') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror   
            </label> 
            <label for="type"><p class="text-base font-bold text-mediumBlue">Type :</p>
                <select wire:model="type" class="w-full shadow focus:ring-mediumBlue  focus:border-mediumBlue border border-lightBlue rounded-lg  placeholder-slate-400 transition" >
                    <option value="Aéroport">Aéroport</option>
                    <option value="Gare Routière">Gare Routière</option>
                </select>
                @error('type') <span class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</span> @enderror   
            </label> 
            <button type="submit" class=" text-white bg-gradient-to-r from-lightBlue to-mediumBlue rounded-lg shadow-lg w-full font-cabin font-semibold uppercase py-2 hover:saturate-150 mt-3">Enregistrer</button>
        </form>

    </div>
</div>