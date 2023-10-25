<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Drive Ease</title>

  <!-- Tailwind -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

</head>
<body class="bg-bleuclair min-h-screen">

  <!-- Navbar -->
  <div class="navbar bg-transparent max-h-12">
    <div class="flex-1 ">
        <a href="/"><img src="{{asset('images/composants/logo.png')}}"
          class="h-7 w-auto ml-1 max-md:hidden hover:translate-x-2 transition-transform duration-300 ease-in-out" alt="logo"></a>
        <a href="/" class="font-semibold normal-case text-xl p-2">DriveEase</a>
    </div>

    <!-- for medium and big screen -->
    <ul class="menu menu-horizontal px-3 max-md:hidden">
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="/" class=" md:text-lg text-base">Accueil</a></li>
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="/cars" class=" md:text-lg text-base">Voitures</a></li>
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="#" class=" md:text-lg text-base">À propos</a></li>
      @auth
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="/dashboard" class=" md:text-lg text-base bg-emerald-600 hover:bg-emerald-500 bg-opacity-40">Espace Client</a></li>
      @else
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="{{ route('login') }}" class=" md:text-lg text-base">Connexion</a></li>
      <li class="md:px-1 lg:px-5 hover:translate-x-2 transition-transform duration-300 ease-in-out">
        <a href="{{ route('register') }}" class=" md:text-lg text-base">Inscription</a></li>
      @endauth
    </ul>

    <!-- medium to small screen -->
    <div class="dropdown dropdown-bottom dropdown-end md:hidden">
      <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 m-2 fill-"><path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
      <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="/" class="text-base" >Accueil</a></li>
        <li><a href="/cars" class="text-base" >Voitures</a></li>
        <li><a href="#" class="text-base">À propos</a></li>
        @auth
        <li><a href="/dashboard" class="text-base bg-emerald-200">Espace Client</a></li>
        @else
        <li><a href="{{ route('login') }}" class="text-base" >Connexion</a></li>
        <li><a href="{{ route('register') }}" class="text-base" >Inscription</a></li>
        @endauth
      </ul>

  </div>
</div>

<!-- Contenu -->
@yield('content')

</body>
</html>