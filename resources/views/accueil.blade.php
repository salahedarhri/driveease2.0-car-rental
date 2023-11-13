@extends('layouts.client')

@section('content')

  <div class="grid justify-center p-5 bg-white rounded-xl md:max-w-3xl lg:max-w-5xl mx-auto max-sm:mx-2 my-8 shadow-md">

    <form action="{{ route('voituresDisponibles')}}" method="post" class="w-full">
      @csrf
      <div class="grid w-full place-items-center gap-3 md:grid-cols-2 lg:grid-cols-4">
          <div class="w-full">
            <label for="lieuDepart" class="block font-bold ">Lieu du départ</label>
            <input type="text" name="lieuDepart"  placeholder="Entrez le lieu de départ"
            class="appearance-none border-mediumBlue rounded w-full py-3 pl-10 mt-2"
            style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-repeat: no-repeat;
             background-position: 8px center; background-size: 1.5rem; ">
            @error('lieuDepart')  <p class="text-red-600">{{ $message }}</p> @enderror
          </div>
          <div class="w-full">
            <label for="lieuRetour" class="block font-bold ">Lieu du retour</label>
            <input type="text" name="lieuRetour" placeholder="Entrez le lieu de retour"
            class="appearance-none border-mediumBlue rounded w-full py-3 pl-10 mt-2"
            style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-repeat: no-repeat;
             background-position: 8px center; background-size: 1.5rem; ">
            @error('lieuRetour')  <p class="text-red-600">{{ $message }}</p> @enderror
          </div>
          <div class="w-full">
            <label for="heureDepart" class="block font-bold ">Temps du départ</label>
            <div class="relative">
              <!-- medium/big screen format -->
              <input type="text" id="dateTime" name="dateDepart" placeholder="Entrez la date de départ"
              class="appearance-none border-mediumBlue rounded w-full py-3 pl-10 mt-2"
              style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-repeat: no-repeat;
               background-position: 8px center; background-size: 1.5rem; ">
              <i class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600 pointer-events-none"><i class="fas fa-user"></i></i>
              @error('dateDepart')  <p class="text-red-600">{{ $message }}</p> @enderror
            </div>

          </div>
          <div class="w-full">
            <label for="heureRetour" class="block font-bold ">Temps du retour</label>
            <input type="text" id="dateTime" name="dateRetour" placeholder="Entrez la date de retour"
            class="appearance-none border-mediumBlue rounded w-full py-3 pl-10 mt-2"
            style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-repeat: no-repeat;
             background-position: 8px center; background-size: 1.5rem; ">
            @error('dateRetour')  <p class="text-red-600">{{ $message }}</p> @enderror
          </div>


      </div>
      <input type="submit" value="Rechercher" class="btn bg-lightBlue mt-4 mb-2 text-white">
      
    </form>
  </div>

  <!-- flatpicker for dateTime input -->
  @once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
      flatpickr('#dateTime' , {
        enableTime: true,
        dateFormat: "d-m-Y H:i",
        minTime: "06:00",
        maxTime: "01:00",
      });
    </script>
  @endonce

@endsection

