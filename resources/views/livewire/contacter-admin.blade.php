<section class="grid grid-cols-2 max-md:grid-cols-1 justify-center align-center px-4 py-8 gap-8">
    <section class="w-full max-w-lg mx-auto">

        @if (session()->has('message'))
            <div role="alert" class="alert alert-success bg-teal-500 shadow text-white font-montserrat py-3 my-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        <h3 class="font-montserrat md:text-xl max-md:text-lg text-center pt-3 pb-6 bg-gradient-to-r from-mediumBlue to-teal-500 text-transparent bg-clip-text py-3">Contactez-nous En Ligne</p>
        <p class="font-cabin text-sm text-end pb-1 text-darkBlue py-4">* : Champ Obligatoire</p>

        <form wire:submit.prevent="validerContact" class="w-full flex flex-col gap-6 max-sm:gap-4 py-3 font-montserrat text-darkBlue text-left">
            <label for="nomContact">
                <input type="text" name="nomContact" placeholder="Nom *" wire:model="nomContact"
                class="w-full shadow focus:ring-teal-400  focus:border-teal-500 border border-slate-300 rounded-lg  placeholder-slate-400 transition">
                @error('nomContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="prenomContact">
                <input type="text" name="prenomContact" placeholder="Prénom *" wire:model="prenomContact"
                class="w-full shadow focus:ring-teal-400  focus:border-teal-500 border border-slate-300 rounded-lg  placeholder-slate-400 transition">
                @error('prenomContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="emailContact">
                <input type="email" name="emailContact" placeholder="Email *" wire:model="emailContact"
                class="w-full shadow focus:ring-teal-400  focus:border-teal-500 border border-slate-300 rounded-lg  placeholder-slate-400 transition">
                @error('emailContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="numTelContact">
                <input type="tel" name="numTelContact" placeholder="Num Téléphone" wire:model="numTelContact"
                class="w-full shadow focus:ring-teal-400  focus:border-teal-500 border border-slate-300 rounded-lg  placeholder-slate-400 transition" >
                @error('numTelContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="msgContact">
                <textarea name="msgContact" placeholder="Entrer un message *" rows="4" cols="50" wire:model="msgContact"
                class="w-full shadow focus:ring-teal-400  focus:border-teal-500 border border-slate-300 rounded-lg placeholder-slate-400 transition"></textarea>
                @error('msgContact') <p class="text-red-500 font-cabin text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>

            <button type="submit" class="text-white text-base font-montserrat uppercase font-semibold px-4 py-2 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-lg shadow w-fit mx-auto hover:saturate-150 transition">Envoyer</button>
        </form>

    </section>

    <section class="flex flex-col align-center text-center py-3 gap-2 font-montserrat">
        <h3 class="font-montserrat md:text-xl max-md:text-lg text-center pb-6 bg-gradient-to-r from-mediumBlue to-teal-500 text-transparent bg-clip-text">Nos Cordonnées</h3>
        <h4 class="font-bold underline text-teal-600 text-lg">National</h4>
        <span class="md:text-lg max-md:text-base"><b class="text-mediumBlue">Tél :</b> 
            <a href="tel:+212653 96 75 79" class="text-darkBlue">+212 6 53 96 75 79</a></span>
        <span class="md:text-lg max-md:text-base"><b class="text-mediumBlue">Email :</b>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=arhri.salah.pro@gmail.com" target="_blank" class="decoration-teal-600 hover:underline transition text-darkBlue">arhri.salah@gmail.com</a></span>
    </section>

</section>
