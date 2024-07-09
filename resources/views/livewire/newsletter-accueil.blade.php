<section class="w-full bg-slate-200">
  <div  x-data="{ imageNewsletter:false }" class="font-montserrat grid md:grid-cols-2 max-md:grid-cols-1 gap-0 max-w-7xl mx-auto justify-center items-center md:py-16">

    {{-- Image --}}
    <div x-intersect:enter="imageNewsletter=true" x-intersect:leave="imageNewsletter=false" class="svgBackground p-4 md:pr-0">
      <img x-show="imageNewsletter" loading="lazy" x-transition.duration.700ms
          src="{{ asset('images/composants/newsletter-600w.png') }}" alt="landing car photo" class="aspect-auto my-auto"
          srcset="
          {{ asset('images/composants/newsletter-800w.png')}} 800w,
          {{ asset('images/composants/newsletter-600w.png')}} 600w,
          {{ asset('images/composants/newsletter-400w.png')}} 400w,
          " >
    </div>

    {{-- Formulaire --}}
    <div class="px-4 max-md:pb-6 max-md:text-center align-center justify-center text-pretty">

      <h2 class="text-mediumBlue md:text-3xl max-md:text-2xl font-bold md:py-4 max-md:pb-2">Souscrivez pour recevoir nos dernières nouveautés</h2>
      <p class="text-darkBlue py-4 md:px-4 font-cabin text-base">
        <b class="text-teal-500 font-montserrat">Ne manquez plus aucune offre!</b>
          Inscrivez-vous à la newsletter de DriveEase pour recevoir les dernières promotions, des astuces de voyage, et des informations exclusives directement dans votre boîte mail.<br><br>
          Rejoignez notre communauté et restez toujours informé!
      </p>

      <form wire:submit.prevent="AjouterEmail" class="flex flex-col gap-2 bg-white p-2 m-1 max-w-md justify-evenly rounded shadow-lg max-md:mx-auto">
        <div class="flex flex-row w-full gap-1 items-center">
            <input type="email" name="emailNewsletter" wire:model.defer="emailNewsletter" placeholder="Votre adresse email"
              class="w-full p-2 border-2 focus:ring-0 rounded-md border-teal-400 shadow-sm text-md" >
            <button wire:loading.attr="disabled" type="submit"
              class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:saturate-150 transition-all text-white rounded font-semibold uppercase py-1 px-2 cursor-pointer flex flex-col place-items-center">
              <i wire:loading.remove class="ri-mail-send-line text-2xl"></i>
              <span wire:loading.delay class="loading loading-spinner loading-md"></span>
            </button>
        </div>
        @error('emailNewsletter')<p class="text-sm text-red-500 pl-2 text-left font-semibold">{{ $message }}</p>@enderror
      </form>
    </div>

    {{-- Newsletter Modal --}}  
    @if (session()->has('success'))
      <div  x-data="{ modalNewsletter:true }"  x-show="modalNewsletter"  @click.away="modalNewsletter=false">
        @include('composants.modalNewsletterConfirmation')
      </div>
    @endif    

  </div>
</section>