<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue au Newsletter DriveEase !</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-slate-300 text-darkBlue p-4">
    <article class="container max-w-5xl mx-auto flex flex-col bg-slate-100 font-cabin rounded-b-lg shadow-lg text-center">
        <section class="container max-w-5xl text-white mx-auto flex flex-row justify-between align-middle px-4 py-4 bg-mediumBlue font-cabin rounded-b-lg text-center">
            <div class="flex items-center">
                <a href="{{ route('accueil')}}">
                <img src="{{ asset('images/composants/logo.png') }}"
                    class="invert h-7 w-auto" alt="logo">
                </a>
                <a href="{{ route('accueil')}}"
                class="font-semibold normal-case text-xl text-whiteBlue hover:text-lightBlue max-md:hidden">DriveEase</a>
            </div>
            <span class="self-center">{{ $email }}</span>
        </section>
        <section class="flex flex-col gap-4 px-4 py-8">
            <h1 class="font-montserrat md:text-xl max-md:text-lg text-center font-semibold">Bienvenue au Newsletter DriveEase !</h1>
            <p>Vous recevrez des offres exclusives, des réductions spéciales et des nouvelles sur nos dernières arrivées de voitures.<br>
                Vous découvrirez également des conseils pratiques pour voyager en toute sérénité, des itinéraires de voyage recommandés, et des témoignages de nos clients satisfaits.<br>
                Ne manquez pas nos promotions limitées et soyez les premiers informés de nos nouveautés.</p>
        </section>
        <section class="w-full flex md:flex-row max-md:flex-col justify-center align-center bg-mediumBlue text-white p-4">
            <img src="{{ asset('images/voitures/blue-four-wheel-drive-hyundai-tucson-car-400w.png')}}" alt="blue-four-wheel-drive-hyundai-tucson-car" loading="lazy" class="object-contain object-center">
            <section class="flex flex-col gap-3 p-2 justify-center align-center">
                <h2 class="font-montserrat text-lg font-semibold text-teal-200">
                    Hyundai Tucson est maintenant disponible !
                </h2>
                <p>Pour l'été 2024, DriveEase vous promet de nouvelles gammes de voitures et c'est hyundai qui s'offre à vous avec la nouvelle Hyundai Tucson disponible <i class="text-teal-200">( -15% du prix du voiture / Jour )</i> à Agadir, Marrakech et Casablanca en nombre limitée!</p>
            </section>
        </section>
        <section class="w-full flex md:flex-row max-md:flex-col justify-center align-center bg-slate-100 text-teal-950 p-4">
            <section class="flex flex-col gap-3 p-2 justify-center align-center">
                <h2 class="font-montserrat text-lg font-semibold text-gray-600 ">
                    La BMW Série 1 fait son retour !
                </h2>
                <p>Profitez du retour de la BMW 1ère série chez DriveEase, disponible à Marrakech et Casablanca. Réservez dès maintenant pour vivre une expérience de conduite exceptionnelle !</p>
            </section>
            <img src="{{ asset('images/voitures/blue-shiny-bmw-car-400w.png')}}" alt="blue-shiny-bmw-car" loading="lazy" class="object-contain object-center max-md:order-first">
        </section>

        <section class="w-full flex flex-col gap-3 justify-center align-center p-5 text-white bg-teal-700 bg-opacity-85 rounded-b-lg">
            <h2 class="font-montserrat text-lg font-semibold text-cyan-200 ">Profitez de nos offres !</h2>
            <p>Profitez de ces offres le long de vos vacances ( offres disponibles du 01 Juin 2024 à 01 Septembre 2024), Les voitures apparaitront selon leur disponibilité après avoir rempli la formulaire d'accueil.<br>
            les prix de location sont automatiquement mis à jour incluant le solde.</p>
            <a href="{{ route('accueil') }}" class="w-fit mx-auto px-4 py-2 font-montserrat bg-white hover:bg-teal-500 hover:text-white transition-all text-mediumBlue font-semibold my-4 rounded shadow-lg">Réserver maintenant</a>
        </section>
    </article>

    <footer class="text-center py-4 text-sm text-slate-600 font-cabin">
        &copy; 2024 DriveEase. Ceci est une entreprise fictive.
    </footer>
</body>
</html>