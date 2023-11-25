@extends('admin.layout')

@section('content')

  <div>

    <p class="text-lg max-md:text-md text-cyan-900 p-3 mt-2">Liste des voitures</p>
    
    {{-- Recherche --}}

    <div class="overflow-x-auto border border-slate-400 rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1">

        <thead class="text-lightBlue">
          <tr class="border-b-slate-300">
            <th class="max-md:hidden text-center  ">Photo</th>
            <th>Modèle</th>
            <th>Prix(Jour)</th>
            <th>Boîte</th>
            <th>Clim.</th>
            <th class="max-md:hidden text-center p-1">Max Pers.</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >

          @foreach($voitures as $voiture)
            <tr class="border-b-slate-300 hover:bg-sky-100">
              <td class="max-md:hidden"><div class="avatar"><div class="mask h-7 w-11"><img src="{{ asset('images/voitures/'.$voiture->photo) }}" alt="car image"/></div></div></td>
              <td> {{ $voiture->modele }} </td>
              <td> {{ $voiture->prix }} Dh</td>
              <td> {{ $voiture->transmission }} </td>
              <td> {{ $voiture->climatisation ? 'Oui' : 'Non'}} </td>
              <td class="max-md:hidden text-center"> {{ $voiture->nbPers}} </td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-cyan-900 text-2xl"></i></a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$voitures->links()}}
    </div>

  </div>

@endsection