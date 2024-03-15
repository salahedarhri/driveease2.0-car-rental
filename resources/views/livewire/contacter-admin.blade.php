<div>

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center align-center px-4 py-8 gap-8">
        <div class="w-full max-w-lg mx-auto">
            <p class="font-cabin text-lg  text-center pb-4 italic">Contactez-nous En Ligne..</p>
            <p class="font-montserrat text-sm text-end pb-1 text-slate-500">* : Champ Obligatoire</p>

            <form wire:submit.prevent="validerContact" class="w-full flex flex-col gap-5 font-montserrat">
                <label for="nomContact">
                    <input type="text" name="nomContact" placeholder="Nom *" wire:model="nomContact"
                    class="w-full shadow focus:ring-teal-400  focus:border-teal-400 border border-slate-300 rounded-lg  placeholder-slate-400 transition delay-100">
                    @error('nomContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="prenomContact">
                    <input type="text" name="prenomContact" placeholder="Prénom *" wire:model="prenomContact"
                    class="w-full shadow focus:ring-teal-400  focus:border-teal-400 border border-slate-300 rounded-lg  placeholder-slate-400 transition delay-100">
                    @error('prenomContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="emailContact">
                    <input type="email" name="emailContact" placeholder="Email *" wire:model="prenomContact"
                    class="w-full shadow focus:ring-teal-400  focus:border-teal-400 border border-slate-300 rounded-lg  placeholder-slate-400 transition delay-100">
                    @error('emailContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="numTelContact">
                    <input type="tel" name="numTelContact" placeholder="Num° Téléphone" wire:model="emailContact"
                    class="w-full shadow focus:ring-teal-400  focus:border-teal-400 border border-slate-300 rounded-lg  placeholder-slate-400 transition delay-100">
                    @error('numTelContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="msgContact">
                    <textarea name="msgContact" placeholder="Entrer un message *" rows="4" cols="50" wire:model="msgContact"
                    class="w-full shadow focus:ring-teal-400  focus:border-teal-400 border border-slate-300 rounded-lg placeholder-slate-400 transition delay-100"></textarea>
                    @error('msgContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>

                <button type="submit" class="text-white font-cabin uppercase font-semibold px-4 py-2 bg-teal-500 rounded shadow-lg w-fit mx-auto hover:bg-teal-600 transition">Envoyer</button>
            </form>

        </div>
        <div class="flex flex-col justify-center align-center text-center font-montserrat">
            <p class="font-cabin text-lg  text-center pb-4 italic">.. Ou Par Nos Cordonnées</p>

            
        </div>

    </div>
</div>
