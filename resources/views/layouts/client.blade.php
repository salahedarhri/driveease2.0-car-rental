<!DOCTYPE html>
<html lang="en">
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
    <nav class="cabin flex justify-between px-4 py-3 max-w-7xl mx-auto  text-white">
      <div class="flex items-center">
        <a href="#" class="flex">
          <i class="ri-car-line text-3xl pr-2"></i>
          <p class="text-xl">DriveEase</p>
        </a>
      </div>
      <div class="flex gap-6 py-2 max-md:hidden">
        <a href="#" class="text-md cursor-pointer">Accueil</a>
        <a href="#" class="text-md cursor-pointer">Voitures</a>
        <a href="#" class="text-md cursor-pointer">À propos</a>
      </div>
      <div class="flex">
        <i class="ri-user-fill text-2xl px-2 border-r"></i>
        <i class="ri-whatsapp-fill text-2xl px-2"></i>
      </div>
    </nav>
  </div>

  @yield('content')

  <!-- Footer -->
  <div class="w-screen bg-sky-700">
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