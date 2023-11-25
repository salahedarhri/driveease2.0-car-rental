@extends('admin.layout')

@section('content')

  <div class="p-4">
    <p class="text-lg max-md:text-md text-cyan-900 p-2">Liste des voitures</p>
    <div class="overflow-x-auto">
      <table class="table md:table-sm max-md:table-xs">

        <thead class="text-lightBlue">
          <tr class="border-b-slate-300">
            <th class="max-md:hidden">Photo</th>
            <th>Modèle</th>
            <th>Prix(Jour)</th>
            <th>Boîte</th>
            <th>Clim.</th>
            <th class="max-md:hidden">Max Pers.</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >

          @foreach($voitures as $voiture)
            <tr class="border-b-slate-300">
              <td class="max-md:hidden"><div class="avatar"><div class="mask h-7 w-11"><img src="{{ asset('images/voitures/'.$voiture->photo) }}" alt="car image"/></div></div></td>
              <td> {{ $voiture->modele }} </td>
              <td> {{ $voiture->prix }} Dh</td>
              <td> {{ $voiture->transmission }} </td>
              <td> {{ $voiture->climatisation ? 'Oui' : 'Non'}} </td>
              <td class="max-md:hidden"> {{ $voiture->nbPers}} </td>
              <td><a href=""><i class="ri-settings-2-line text-cyan-900 text-2xl" ></i></a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@endsection