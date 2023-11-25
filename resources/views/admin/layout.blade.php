<!DOCTYPE html >
<html lang="en" data-theme="nord">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>DriveEase | Espace Admin</title>

  <!-- Roboto Font + icons -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet"> 
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Tailwind + JS -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  
</head>
<body class="bg-slate-100 min-h-screen text-black">

  {{-- Barre de côté --}}
  <div class="fixed left-0 top-0 w-64 max-md:hidden h-full bg-gradient-to-b from-mediumBlue to-darkBlue p-4 ">
    <a href="/" class="flex items-center pb-4 border-b border-b-gray-100">
      <img src="{{ asset('images/composants/logo.png') }}" alt="logo" class="w-16 h-auto invert">
      <span class="text-xl font-bold text-white ml-3 hover:text-lightBlue transition-all">DriveEase</span>
    </a>
    <ul>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-slate-500 hover:text-white rounded transition-all">
          <i class="ri-home-2-line mr-3 text-xl"></i>
          <span class="">Dashboard</span></a></li>
      <li>
        <a href="{{route('admin.utilisateurs.index')}}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-slate-500 hover:text-white rounded transition-all">
          <i class="ri-account-circle-line mr-3 text-xl"></i>
          <span class="">Utilisateurs</span></a></li>
      <li>
        <a href=" {{route('admin.voitures.index')}} " class="flex items-center py-2 px-4 text-gray-300 hover:bg-slate-500 hover:text-white rounded transition-all">
          <i class="ri-car-line mr-3 text-xl"></i>
          <span class="">Voitures</span></a></li>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-slate-500 hover:text-white rounded transition-all">
          <i class="ri-book-2-line mr-3 text-xl"></i>
          <span class="">Réservations</span></a></li>
    </ul>
  </div>

  <div class="md:w-[calc(100%-256px)] md:ml-64 max-md:w-full">

    {{-- Barre de haut --}}
    <div class="py-2 px-6 bg-white flex items-center shadow-md">

        {{-- Mobile seulement --}}
        <div class="dropdown dropdown-bottom md:hidden">
          <label tabindex="0" class="btn m-1 bg-slate-100 hover:bg-slate-300 border-slate-100 hover:border-slate-500"><i class="ri-menu-fill text-lg"></i></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-cyan-900 text-white">
            <li><a href="{{ route('admin.utilisateurs.index')}}"><i class="ri-account-circle-line mr-3 text-2xl"></i>Utilisateurs</a></li>
            <li><a href="{{ route('admin.voitures.index')}}"><i class="ri-car-line mr-3 text-2xl"></i>Voitures</a></li>
            <li><a><i class="ri-book-2-line mr-3 text-2xl"></i>Reservations</a></li>
          </ul>
        </div>

        <ul class="flex items-center ml-4 max-md:hidden">
          <li class="mr-2"><a href="#" class="text-slate-500 hover:text-slate-700 font-semiBold">Dashboard</a></li>
          <li class="mr-2 text-slate-500">/</li>
          <li class="mr-2 text-slate-500">Analytiques</li>
        </ul>
      
      <ul class="ml-auto">
        <li class="flex items-center">
          <i class="ri-search-line text-xl mr-2 text-slate-700"></i>
          {{-- Recherche --}}
          <form action="" method="post">
            <input type="text" placeholder="Rechercher" class="rounded appearence-none border-slate-300 focus:border-slate-300 mr-2 h-10 max-md:w-32">
          </form>
          {{-- Profil --}}
          <div class="dropdown dropdown-end p-0 m-0">
            <label tabindex="0" class="btn bg-slate-100 hover:bg-slate-300 border-slate-100 hover:border-slate-500 px-2">
              <i class="ri-account-circle-fill text-4xl text-cyan-800"></i>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-white">
              <li><a>Profil</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                @csrf <input type="submit" value="Se déconnecter"></form>
              </li>
            </ul>
          </div>
        </li>
      </ul>

    </div>

    {{-- Main --}}
    <div class="font-tables">
      @yield('content')
    </div>


  </div>


</body>
</html>