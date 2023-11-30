
{{-- Formulaire d'accueil --}}

<div class="h-largeHeight bg-cover bg-center bg-no-repeat" style="background-image:url('{{asset('images/composants/landing_updated.jpg')}}');"> 
  
  <div class=" w-full h-full relative">
    <div class="grid justify-center mt-24 p-5 bg-neutral-100 rounded-md shadow-md md:max-w-3xl max-md:w-72 lg:max-w-5xl mx-auto absolute bottom-0 right-0 left-0 max-md:-bottom-24">
      
      <form action="{{ route('voituresDisponibles')}}" method="post" class="w-full">
        @csrf
        <div class="grid w-full place-items-center gap-3 md:grid-cols-2 lg:grid-cols-4 text-white">
            <div class="w-full">
              {{-- <label for="lieuDepart" class="block font-bold ">Lieu du départ</label> --}}
              <input type="text" name="lieuDepart"  placeholder="Lieu de départ" class="formInput max-md:text-slate-800 md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
               style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('lieuDepart')  <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
              {{-- <label for="lieuRetour" class="block font-bold ">Lieu du retour</label> --}}
              <input type="text" name="lieuRetour" placeholder="Lieu de retour" class="formInput max-md:text-slate-800 md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
               style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('lieuRetour')  <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
              {{-- <label for="heureDepart" class="block font-bold ">Temps du départ</label> --}}
              <div class="relative">
                <input type="text" id="dateTime1" name="dateDepart" placeholder="Date de départ" class="formInput text-slate-800 md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
                 style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-position: 8px center; background-size: 1.5rem;">
                <i class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600 pointer-events-none"><i class="fas fa-user"></i></i>
                @error('dateDepart')  <p class="text-red-600">{{ $message }}</p> @enderror
              </div>

            </div>
            <div class="w-full">
              {{-- <label for="heureRetour" class="block font-bold ">Temps du retour</label> --}}
              <input type="text" id="dateTime2" name="dateRetour" placeholder="Date de retour" class="formInput text-slate-800 md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
               style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('dateRetour')  <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
        <input type="submit" value="Rechercher" class="btn rounded-none bg-teal-500 hover:bg-teal-600 mt-4 mb-2 text-white">
      </form>


    </div>
  </div>
</div>

{{-- flatpicker for dateTime input  --}}
  @once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
      flatpickr('#dateTime1' , {
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        minTime: "06:00",
        maxTime: "01:00",
        defaultDate:new Date().fp_incr(1),
        defaultHour:12,
        defaultMinute:30,
      });

      flatpickr('#dateTime2' , {
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        minTime: "06:00",
        maxTime: "01:00",
        defaultDate:new Date().fp_incr(2),
        defaultHour:12,
        defaultMinute:30,
      });
    </script>
  @endonce