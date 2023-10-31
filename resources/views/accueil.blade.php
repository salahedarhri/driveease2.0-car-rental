@extends('layout')

@section('content')

<div class="grid justify-center p-5 bg-white rounded-xl max-w-md mx-auto my-8 shadow-md">

  <form action="" method="post" class="flex flex-col ">
    <label for="typeVehicule" class="block font-bold">Type du véhicule</label>
    <select name="typeVehicule" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
      <option value="Voiture">Voiture</option>
      <option value="Utilitaires">Utilitaires</option>
      <option value="Luxe">Luxe</option>
    </select>

    <label for="lieuDepart" class="block font-bold ">Lieu du départ</label>
    <input type="text" name="lieuDepart" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    <label for="lieuRetour" class="block font-bold ">Lieu du retour</label>
    <input type="text" name="lieuRetour" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    <label for="heureDepart" class="block font-bold ">Temps du départ</label>
    <input type="date" name="heureDepart" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">
    <label for="heureRetour" class="block font-bold ">Temps du retour</label>
    <input type="date" name="heureRetour" id="" class="appearance-none border-lightBlue rounded w-full h-10 m-1">

    <input type="submit" value="Rechercher" class="btn bg-lightBlue mt-4 mb-2 w-full text-white ">
  </form>

</div>



@endsection