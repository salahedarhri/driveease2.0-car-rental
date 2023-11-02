@extends('layout')

@section('content')

<div class="grid justify-center p-5 bg-white rounded-xl max-w-md mx-auto my-8 shadow-md">

  <form action="{{ route('voituresDisponibles')}}" method="post" class="flex flex-col ">
    @csrf
    
    <label for="lieuDepart" class="block font-bold ">Lieu du départ</label>
    <input type="text" name="lieuDepart"  placeholder="Entrez le lieu de départ" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    @error('lieuDepart')
    <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror
    <label for="lieuRetour" class="block font-bold ">Lieu du retour</label>
    <input type="text" name="lieuRetour" placeholder="Entrez le lieu de retour" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    @error('lieuRetour')
    <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror
    <label for="heureDepart" class="block font-bold ">Temps du départ</label>
    <input type="date" name="dateDepart" placeholder="Entrez la date de départ" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    @error('dateDepart')
    <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror
    <label for="heureRetour" class="block font-bold ">Temps du retour</label>
    <input type="date" name="dateRetour" placeholder="Entrez la date de retour" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    @error('dateRetour')
    <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror

    <input type="submit" value="Rechercher" class="btn bg-lightBlue mt-4 mb-2 w-full text-white ">
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