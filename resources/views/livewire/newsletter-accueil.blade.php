<div class="w-full bg-slate-200
 {{-- bg-gradient-to-r from-sky-700 to-teal-700 --}}
 ">
    <div class="max-w-7xl mx-auto md:py-8">
      <div x-data="{ shown2:false }" class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center">
  
        <div x-intersect:enter="shown2=true" x-intersect:leave="shown2=false" class="svgBackground p-4">
          <img x-show="shown2" loading="lazy" x-transition.duration.700ms src="{{ asset('images/composants/newsletter.png') }}" alt="landing car photo" class="aspect-auto my-auto">
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

          <h2 class="text-mediumBlue text-3xl font-bold py-4 max-md:pb-2">Souscrivez pour recevoir nos dernières nouveautés</h2>
          <p class="text-darkBlue py-4 font-cabin text-base"><b class="text-cyan-600">Ne manquez plus aucune offre!</b> Inscrivez-vous à la newsletter de DriveEase pour recevoir les dernières promotions, des astuces de voyage, et des informations exclusives directement dans votre boîte mail. Rejoignez notre communauté et restez toujours informé!</p>
  
          <form wire:submit.prevent="AjouterEmail" class="flex flex-col gap-2 bg-white p-2 m-1 max-w-md justify-evenly rounded shadow-lg max-md:mx-auto" novalidate>
            
            <div class="flex flex-row w-full gap-1 items-center">
                <input type="email" name="emailNewsletter" wire:model.lazy="emailNewsletter" placeholder="Votre adresse email"
                class="w-full p-2 border-2 focus:ring-0 rounded-md border-cyan-400 shadow-sm text-md" >
                <button type="submit"
                class="bg-cyan-500 hover:bg-teal-600 transition-all text-white rounded font-semibold uppercase py-1 px-2 cursor-pointer">
                <i class="ri-mail-send-line text-2xl"></i>
              </button>
            </div>

            @error('emailNewsletter')<p class="text-sm text-red-500 pl-2 text-left font-semibold">{{ $message }}</p>@enderror

          </form>
        </div>

      </div>
    </div>
  </div>