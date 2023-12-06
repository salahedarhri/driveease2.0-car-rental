@extends('layouts.index')

@section('content')
  <div class="h-96 w-full mx-auto grid md:grid-cols-2 max-md:grid-cols-1 lg:max-w-7xl md:max-w-5xl max-md:w-full">

    <div class="w-full h-full flex flex-col mx-auto px-5 py-2 max-md:text-center">
      <p class="font-semiLight font-titles text-lightBlue pt-12 pb-2">____ Bienvenue chez DriveEase</p>
      <p class="text-5xl font-titles font-bold text-mediumBlue py-3">Trouvez la voiture qui vous correspond</p>

      <p class="font-semibold font-titles text-sm text-darkBlue py-2">
        &ensp;Que vous planifiez une escapade en ville, une aventure sur la route ou un voyage d'affaires, notre processus de réservation convivial
        vous permet de trouver et de réserver la voiture parfaite en quelques clics.</p>

      <button class="btn my-7 mx-3 p-3 w-60  bg-lightBlue text-white shadow-md border-none hover:bg-teal-600 max-md:self-center">Découvrez notre sélection</button>
    </div>

    <div class="w-full h-full flex align-center justify-center">
      <img src="{{ asset('images/composants/landing.png') }}" alt="landing photo" class="w-full p-9 h-auto object-cover">
    </div>

  </div>
    
  <div class="w-full grid justify-center p-5 bg-white lg:max-w-4xl md:max-w-2xl max-md:w-72 mx-auto rounded-md shadow-md">

    <form action="{{ route('voituresDisponibles')}}" method="post">
      @csrf
        <div class="grid w-full place-items-center gap-3 md:grid-cols-2 lg:grid-cols-4 text-darkBlue">
            <div class="w-full">
              <label for="lieuDepart" class="block font-bold ">Lieu du départ</label>
              <input type="text" name="lieuDepart"  placeholder="Lieu de départ" class="formInput md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
              style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('lieuDepart')  <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
              <label for="lieuRetour" class="block font-bold ">Lieu du retour</label>
              <input type="text" name="lieuRetour" placeholder="Lieu de retour" class="formInput md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
              style="background-image: url(' {{ asset('images/icons/location.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('lieuRetour')  <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
              <label for="heureDepart" class="block font-bold ">Temps du départ</label>
                <input type="text" id="dateTime1" name="dateDepart" placeholder="Date de départ" class="formInput md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
                style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-position: 8px center; background-size: 1.5rem;">
                @error('dateDepart')  <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
            </div>
            <div class="w-full">
              <label for="heureRetour" class="block font-bold ">Temps du retour</label>
              <input type="text" id="dateTime2" name="dateRetour" placeholder="Date de retour" class="formInput md:w-full max-md:w-64 rounded py-3 pl-12 mt-2"
              style="background-image: url(' {{ asset('images/icons/calendar.png') }} '); background-position: 8px center; background-size: 1.5rem;">
              @error('dateRetour')  <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
      
        <input type="submit" value="Rechercher" class="btn rounded-md bg-lightBlue hover:bg-teal-600 mt-4 mb-2 text-white">
    </form>

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

@endsection

