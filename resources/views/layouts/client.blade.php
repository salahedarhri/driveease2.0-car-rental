<!DOCTYPE html>
<html lang="fr" data-theme="pastel">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>DriveEase | Location de voitures</title>

  {{-- Icon --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('images/icons/site.webmanifest') }}">

  {{-- Tailwind + JS --}}
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>

<body class="overflow-x-hidden antialiased font-swap">

  {{-- Navbar --}}
  <div class="w-full bg-gradient-to-r from-sky-700 to-sky-800">
    <nav class="font-montserrat flex justify-between px-6 md:py-2 max-md:py-1 max-md:px-2 max-w-7xl mx-auto  text-white">

      <div class="flex items-center">
        <a href="{{ route('accueil')}}">
          <img src="{{ asset('images/composants/logo.png') }}"
            class="invert h-7 w-auto hover:translate-x-2 transition-transform duration-300 ease-in-out" alt="logo">
        </a>
        <a href="{{ route('accueil')}}"
          class="font-semibold normal-case text-xl p-2 text-whiteBlue hover:text-lightBlue max-md:hidden">DriveEase</a>
      </div>

      {{-- Medium / Big Screen --}}
      <ul class="flex flex-row place-items-center gap-8 py-0 max-md:hidden font-montserrat font-semibold">
        <li class="md:px-1 lg:px-2 transition-all hover:underline">
          <a href="{{ route('accueil') }}" class="hover:text-lightBlue">Accueil</a>
        </li>
        <li class="md:px-1 lg:px-2 transition-all hover:underline">
          <a href="{{ route('cars') }}" class="hover:text-lightBlue">Voitures</a>
        </li>
        <li class="md:px-1 lg:px-2 transition-all hover:underline">
          <a href="{{ route('apropos') }}" class="hover:text-lightBlue">À propos</a>
        </li>
      </ul>

      <div class="flex flex-row items-center max-md:hidden">
        @auth
        <a href="{{ route('dashboard') }}"
          class="font-semibold text-base px-3 py-1 hover:text-lightBlue hover:underline rounded">Espace
          Client</a>
        @endauth
        @guest
        <details class="dropdown dropdown-end apparence-none">
          <summary class="m-0 px-2 btn py-1 capitalize text-md">
            <p class="font-semibold">Connexion</p>
          </summary>

          <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-48 text-mediumBlue">

            <li><a href="{{ route('login') }}" class="font-semibold hover:text-lightBlue px-3 py-2">Se Connecter</a>
            </li>
            <li><a href="{{ route('register') }}" class="font-semibold hover:text-lightBlue px-3 py-2">Inscription</a>
            </li>
          </ul>
        </details>
        @endguest
      </div>

      {{-- Medium / Small Screen --}}
      <div class="md:hidden flex items-center align-center justify-center">
        <div class="dropdown dropdown-end p-0 mr-3">
          <div tabindex="0" role="button" class="m-1"><i class="ri-account-circle-fill text-slate-100 text-3xl active:text-teal-400"></i>
          </div>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-100 rounded-box w-48 text-darkBlue">
            @auth
            <li><a class="font-semibold tracking-wide" href="{{ route('dashboard') }}" class="bg-emerald-200">Espace Client</a></li>
            @endauth
            @guest
            <li><a class="font-semibold tracking-wide" href="{{ route('login') }}">Connexion</a></li>
            <li><a class="font-semibold tracking-wide" href="{{ route('register') }}">Inscription</a></li>
            @endguest
          </ul>
        </div>

        <div class="dropdown dropdown-end">
          <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="150px" height="150px"
              class="w-8 h-8 m-2 fill-white">
              <path
                d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z" />
            </svg></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40 text-darkBlue">
            <li><a class="font-semibold tracking-wide" href="{{ route('accueil') }}">Accueil</a></li>
            <li><a class="font-semibold tracking-wide" href="{{ route('cars') }}">Voitures</a></li>
            <li><a class="font-semibold tracking-wide" href="{{ route('apropos') }}">À propos</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  @yield('content')

  {{-- Footer --}}
  <footer
    class="footer footer-center p-6 bg-gradient-to-b from-sky-700 to-sky-800 text-white font-montserrat text-base z-20 shadow-lg">
    <nav class="grid sm:grid-flow-col max-sm:grid-cols-1 gap-8">
      <a href="{{ route('apropos') }}" class="link link-hover hover:text-teal-500 transition">À propos</a>
      <a href="{{ route('cars') }}" class="link link-hover hover:text-teal-500 transition">Voitures</a>
      <a href="{{ route('accueil') }}" class="link link-hover hover:text-teal-500 transition">Accueil</a>
      <a href="{{ route('dashboard') }}" class="link link-hover hover:text-teal-500 transition">Espace Client</a>
    </nav>
    <aside>
      <p class="font-semibold text-teal-100 max-sm:text-sm">DriveEase © 2024 - Ceci est une entreprise fictive</p>
    </aside>
  </footer>

</body>

</html>