<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>DriveEase | Location de voitures</title>

  <!-- Tailwind + JS -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden antialiased">

  <!-- Navbar -->
  <div class="w-screen bg-sky-700">
    <nav class="font-cabin flex justify-between px-4 md:py-3 max-md:py-1 max-w-7xl mx-auto  text-white">

      <div class="flex items-center">
        <a href="{{ route('accueil')}}">
            <img src="{{ asset('images/composants/logo.png') }}" class="invert h-7 w-auto ml-1 max-md:hidden hover:translate-x-2 transition-transform duration-300 ease-in-out" alt="logo">
        </a>
        <a href="{{ route('accueil')}}" class="font-semibold normal-case text-xl p-2 text-whiteBlue hover:text-lightBlue">DriveEase</a>
      </div>
      
        <!-- Medium / Big Screen -->
        <ul class="menu menu-horizontal flex-1 justify-center px-3 py-0 max-md:hidden">
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
                <details class="dropdown dropdown-end">
                    <summary class="m-0 btn px-3 bg-cyan-700 border-whiteBlue rounded-xl p-0 hover:bg-cyan-600 hover:border-transparent">
                        <i class="ri-user-3-fill text-whiteBlue text-xl py-2 pr-2"></i><p class="text-whiteBlue hover:text-md transition-all">Connexion</p></summary>
                    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-48 text-mediumBlue">
                    <li><a href="{{ route('login') }}" class="text-base hover:text-lightBlue px-3 py-2">Se Connecter</a></li>
                    <li><a href="{{ route('register') }}" class="text-base hover:text-lightBlue px-3 py-2">Inscription</a></li>
                    </ul>
                </details>
            @endguest
        </div>

        <!-- Medium / Small Screen -->
        <div class="md:hidden flex items-center align-center justify-center">
          <div class="dropdown dropdown-end p-0 mr-3">
            <div tabindex="0" role="button" class="m-1"><i class="ri-account-circle-line text-slate-100 text-2xl"></i></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-100 rounded-box w-48 text-darkBlue">
              @auth
                  <li><a href="{{ route('dashboard') }}" class="text-lg bg-emerald-200">Espace Client</a></li>
              @endauth
              @guest
                  <li><a href="{{ route('login') }}" class="text-lg">Connexion</a></li>
                  <li><a href="{{ route('register') }}" class="text-lg">Inscription</a></li>
              @endguest
            </ul>
          </div>

          <div class="dropdown dropdown-end">
              <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 m-2 fill-white"><path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
              <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-100 rounded-box w-40 text-darkBlue">
                  <li><a href="{{ route('accueil') }}" class="text-lg">Accueil</a></li>
                  <li><a href="{{ route('cars') }}" class="text-lg">Voitures</a></li>
                  <li><a href="#" class="text-lg">À propos</a></li>

              </ul>
          </div>
        </div>
    </nav>
  </div>

  @yield('content')

  <!-- Footer -->
  <div class="w-screen bg-sky-700 font-cabin">
    <footer class="footer max-w-7xl p-10 mx-auto bg-transparent text-slate-100">
      <nav>
        <header class="footer-title text-teal-200">Services</header> 
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
      </nav> 
      <nav>
        <header class="footer-title text-teal-200">Company</header> 
        <a class="link link-hover">About us</a>
        <a class="link link-hover">Contact</a>
        <a class="link link-hover">Jobs</a>
        <a class="link link-hover">Press kit</a>
      </nav> 
      <nav>
        <header class="footer-title text-teal-200">Legal</header> 
        <a class="link link-hover">Terms of use</a>
        <a class="link link-hover">Privacy policy</a>
        <a class="link link-hover">Cookie policy</a>
      </nav>
    </footer>
  </div>
    
  
</body>
</html>