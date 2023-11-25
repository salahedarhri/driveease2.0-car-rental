@extends('admin.layout')

@section('content')

  <div class="p-4">
    <p class="text-lg max-md:text-md text-cyan-900 p-2">Liste des utilisateurs</p>
    <div class="overflow-x-auto">
      <table class="table md:table-sm max-md:table-xs">

        <thead class="text-lightBlue">
          <tr class="border-b-slate-300">
            <th>Nom</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >

          @foreach($utilisateurs as $utilisateur)
            <tr class="border-b-slate-300">
              <td> {{ $utilisateur->name }}</td>
              <td> {{ $utilisateur->email }}</td>
              <td><a href=""><i class="ri-settings-2-line text-cyan-900 text-2xl" ></i></a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@endsection