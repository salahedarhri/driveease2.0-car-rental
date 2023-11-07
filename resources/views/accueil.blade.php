@extends('layouts.client')

@section('content')

<div class="grid justify-center p-5 bg-white rounded-xl md:max-w-3xl lg:max-w-5xl mx-auto my-8 shadow-md">

  <form action="{{ route('voituresDisponibles')}}" method="post" class="">
    @csrf
    <div class="grid place-items-center gap-3 md:grid-cols-2 lg:grid-cols-4">

      <div class="block w-full">
        <label for="lieuDepart" class="block font-bold ">Lieu du départ</label>
        <input type="text" name="lieuDepart"  placeholder="Entrez le lieu de départ" class="appearance-none border-lightBlue rounded w-full h-10">
        @error('lieuDepart')
          <p class="text-red-600 mb-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="block w-full">
        <label for="lieuRetour" class="block font-bold ">Lieu du retour</label>
        <input type="text" name="lieuRetour" placeholder="Entrez le lieu de retour" class="appearance-none border-lightBlue rounded w-full h-10">
        @error('lieuRetour')
          <p class="text-red-600 mb-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="block w-full">
        <label for="heureDepart" class="block font-bold ">Temps du départ</label>
        <input type="datetime-local" name="dateDepart" placeholder="Entrez la date de départ" class="appearance-none border-lightBlue rounded w-full h-10">
        @error('dateDepart')
          <p class="text-red-600 mb-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="block w-full">
        <label for="heureRetour" class="block font-bold ">Temps du retour</label>
        <input type="datetime-local" name="dateRetour" placeholder="Entrez la date de retour" class="appearance-none border-lightBlue rounded w-full h-10">
        @error('dateRetour')
          <p class="text-red-600 mb-2">{{ $message }}</p>
        @enderror
      </div>

      {{-- <div class="block w-full">
        <label for="Date time trial">Date et Heure : </label>
        <input type="datetime-local" name="date&heure" class="appearance-none border-lightBlue rounded w-full h-10">
      </div> --}}

    </div>

    <input type="submit" value="Rechercher" class="btn bg-lightBlue mt-4 mb-2 text-white">
  </form>

</div>
@endsection

<!--
  <label for="typeVehicule" class="block font-bold">Type du véhicule</label>
  <select name="typeVehicule" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    <option value="Voiture">Voiture</option>
    <option value="Utilitaires">Utilitaires</option>
    <option value="Luxe">Luxe</option>
  </select>
-->