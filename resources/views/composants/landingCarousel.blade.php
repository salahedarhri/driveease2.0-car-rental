<div class="w-full bg-slate-100">

  <!-- large screen-->
  <div
    class="font-cabin grid grid-cols-3 gap-4 max-md:grid-cols-1 justify-center items-center max-w-7xl mx-auto px-8 py-12 text-sky-800">
    <!-- Luxe -->
    <div class="w-full py-2 bg-white rounded-xl shadow">
      <img src="{{ asset('images/composants/luxe.png') }}" class="aspect-auto object-contain h-48 mx-auto"
        alt="voiture luxe">
      <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Luxe</p>
      <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua.</p>
    </div>
    <!-- Routiere -->
    <div class="w-full py-2 bg-white rounded-xl shadow">
      <img src="{{ asset('images/composants/routier.png') }}" class="aspect-auto object-contain h-48 mx-auto"
        alt="voiture routiere">
      <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Routière</p>
      <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua.</p>
    </div>
    <!-- Utilitaire -->
    <div class="w-full py-2 bg-white rounded-xl shadow">
      <img src="{{ asset('images/composants/utilitaire.png') }}" class="aspect-auto object-contain h-48 mx-auto"
        alt="voiture utilitaire">
      <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Utilitaire</p>
      <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua.</p>
    </div>
  </div>
  <!-- mobile screen-->
  {{-- <div class="bg-sky-100 max-w-md flex flex-col justify-center items-center mx-auto md:hidden">
    <div class="max-w-4xl mx-auto relative" x-data="{ activeSlide: 1, slides: [1, 2, 3] }">
      <!-- Slides -->
      <template x-for="slide in slides" :key="slide">
        <div x-show="activeSlide === slide" class="p-2 h-full flex items-center bg-slate-100 text-sky-800 rounded-lg">
          <template x-if="slide === 1">
            <div class="w-full py-2 bg-white rounded-xl shadow">
              <img src="{{ asset('images/composants/luxe.png') }}" class="aspect-auto object-contain h-48 mx-auto"
                alt="voiture luxe">
              <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Luxe</p>
              <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </template>
          <template x-if="slide === 2">
            <div class="w-full py-2 bg-white rounded-xl shadow">
              <img src="{{ asset('images/composants/routier.png') }}" class="aspect-auto object-contain h-48 mx-auto"
                alt="voiture routiere">
              <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Routière</p>
              <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </template>
          <template x-if="slide === 3">
            <div class="w-full py-2 bg-white rounded-xl shadow">
              <img src="{{ asset('images/composants/utilitaire.png') }}" class="aspect-auto object-contain h-48 mx-auto"
                alt="voiture utilitaire">
              <p class="text-xl text-center montserrat font-semibold text-sky-500 p-3">Utilitaire</p>
              <p class="px-6 pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </template>
        </div>
      </template>

      <!-- Prev/Next Arrows -->
      <div class="absolute inset-0 flex">
        <div class="flex items-center justify-start w-1/2">
          <button
            class="bg-sky-100 text-sky-500 hover:text-teal-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-0"
            x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
            &#11164;
          </button>
        </div>
        <div class="flex items-center justify-end w-1/2">
          <button
            class="bg-sky-100 text-sky-500 hover:text-teal-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-0"
            x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
            &#11166;
          </button>
        </div>
      </div>

      <!-- Buttons -->
      {{-- <div class="w-full flex items-center justify-center p-1 bg-transparent">
        <template x-for="slide in slides" :key="slide">
          <button
            class="flex-1 w-2 h-2 mt-1 mx-6 mb-0 rounded-full overflow-hidden transition-colors duration-500 ease-out hover:bg-cyan-600 hover:shadow-lg"
            :class="{ 'bg-teal-300': activeSlide === slide, 'bg-sky-300': activeSlide !== slide }"
            x-on:click="activeSlide = slide"></button>
        </template>
      </div> --}}

      {{--
    </div> --}}
    {{--
  </div> --}}

</div>