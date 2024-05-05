<div class="w-full bg-gradient-to-r from-sky-700 to-teal-700">
    <div class="max-w-7xl mx-auto md:py-8">
      <div  class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center">
  
        <div class="svgBackground p-4 ">
          <img src="{{ asset('images/composants/newsletter.png') }}" alt="landing car photo" class="aspect-auto my-auto">
        </div>

  
        <div class="px-4 md:pt-12 max-md:pb-6 max-md:text-center align-center justify-center">

            {{-- Alerts succes ou refus --}}
            @if(session('success'))
            <div class="alert alert-success max-w-lg mx-auto my-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error max-w-lg mx-auto my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

          <p class="text-white text-2xl max-md:text-lg font-semibold py-4 max-md:pb-2">Souscrivez pour recevoir nos
            dernières nouveautés</p>
  
          <form wire:submit.prevent="AjouterEmail" class="flex flex-col gap-1 bg-white p-2 m-1 max-w-md justify-evenly rounded shadow-xl max-md:mx-auto" novalidate>
            
            <div class="flex flex-row w-full gap-1 items-center">
                <input type="email" name="emailNewsletter" wire:model.lazy="emailNewsletter" placeholder="Votre adresse email"
                class="w-full p-2 rounded-md border-teal-400 shadow-sm text-md" >
                <button type="submit"
                class="bg-teal-500 hover:bg-teal-600 transition-all text-white rounded shadow-md font-semibold uppercase py-2 px-3 cursor-pointer">
                Envoyer
              </button>
            </div>

            @error('emailNewsletter')<p class="text-sm text-red-500 pl-2 text-left font-semibold">{{ $message }}</p>@enderror

          </form>
        </div>

      </div>
    </div>
  </div>