<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vérification de l'adresse email</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-slate-300 text-darkBlue p-4">
    <header class="container max-w-2xl text-white mx-auto flex flex-row justify-between align-middle px-4 py-4 bg-mediumBlue font-cabin rounded-t-lg text-center">
        <div class="flex items-center">
            <a href="{{ route('accueil')}}">
            <img src="{{ asset('images/composants/logo.png') }}"
                class="invert h-7 w-auto" alt="logo">
            </a>
            <a href="{{ route('accueil')}}"
            class="font-semibold normal-case text-xl text-whiteBlue hover:text-lightBlue max-md:hidden">DriveEase</a>
        </div>
</header>
    <main class="container max-w-2xl mx-auto flex flex-col gap-4 bg-slate-100 font-cabin rounded-b-lg shadow-lg text-center p-4">
        <h1 class="font-montserrat text-mediumBlue md:text-xl max-md:text-lg py-4 font-bold">Vérification de votre adresse email</h1>
        <p>Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.</p>
        <a
         href="{{ $url }}"
        class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:saturate-150 transition-all text-white font-semibold font-montserrat rounded shadow px-4 py-2 w-fit mx-auto">Vérifier l'adresse email</a>
        <p class="py-2 text-slate-700 text-sm">Si vous n'avez pas créé de compte, aucune action supplémentaire n'est nécessaire.</p>
    </main>
    <footer class="text-center py-6 text-sm text-slate-600 font-cabin">
        &copy; 2024 DriveEase. Ceci est une entreprise fictive.
    </footer>
</body>
</html>