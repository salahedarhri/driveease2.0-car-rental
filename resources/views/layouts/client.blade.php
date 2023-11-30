<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DriveEase | Trouvez votre voiture idéale</title>

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Tailwind + JS -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

</head>
<body class="min-h-screen">

<!-- Navbar -->
<div class="navbar bg-trasnparent fixed px-6 py-3 pb-0 sm:text-whiteBlue flex items-center justify-between z-10">

  <div class="flex items-center">
      <a href="/">
          <img src="{{ asset('images/composants/logo.png') }}" class="invert h-7 w-auto ml-1 hover:translate-x-2 transition-transform duration-300 ease-in-out" alt="logo">
      </a>
      <a href="{{ route('accueil')}}" class="font-semibold normal-case text-xl p-2 text-whiteBlue hover:text-lightBlue">DriveEase</a>
  </div>

  <!-- Medium / Big Screen -->
  <ul class="menu menu-horizontal flex-1 justify-center px-3 max-md:hidden">
      <li class="md:px-1 lg:px-2 hover:translate-x-2 transition-transform duration-300 ease-in-out">
          <a href="{{ route('accueil')}}" class="md:text-lg text-base hover:text-lightBlue">Accueil</a>
      </li>
      <li class="md:px-1 lg:px-2 hover:translate-x-2 transition-transform duration-300 ease-in-out">
          <a href="{{ route('cars')}}" class="md:text-lg text-base hover:text-lightBlue">Voitures</a>
      </li>
      <li class="md:px-1 lg:px-2 hover:translate-x-2 transition-transform duration-300 ease-in-out">
          <a href="#" class="md:text-lg text-base hover:text-lightBlue">À propos</a>
      </li>
  </ul>

  <div class="flex items-center max-md:hidden">
      @auth
          <a href="{{ route('dashboard') }}" class="md:text-lg text-base px-3 py-1 rounded">Espace Client</a>
      @endauth
      @guest
          <a href="{{ route('login') }}" class="md:text-lg text-base hover:text-lightBlue px-3 py-1">Connexion</a>
          <a href="{{ route('register') }}" class="md:text-lg text-base hover:text-lightBlue px-3 py-1">Inscription</a>
      @endguest
  </div>

  <!-- Medium / Small Screen -->
  <div class="dropdown dropdown-bottom dropdown-end md:hidden">
      <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 m-2 fill-white"><path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
      <ul tabindex="0" class="dropdown-content z-[1] menu p-3 shadow bg-base-100 rounded-box w-64 text-darkBlue">
          <li><a href="{{ route('accueil') }}" class="text-lg">Accueil</a></li>
          <li><a href="{{ route('cars') }}" class="text-lg">Voitures</a></li>
          <li><a href="#" class="text-lg">À propos</a></li>
          @auth
              <li><a href="{{ route('dashboard') }}" class="text-lg bg-emerald-200">Espace Client</a></li>
          @endauth
          @guest
              <li><a href="{{ route('login') }}" class="text-lg">Connexion</a></li>
              <li><a href="{{ route('register') }}" class="text-lg">Inscription</a></li>
          @endguest
      </ul>
  </div>

</div>




  <!-- Contenu -->
  @yield('content')




</body>
</html>