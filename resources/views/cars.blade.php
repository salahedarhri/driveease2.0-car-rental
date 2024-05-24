@extends('layouts.client')

@section('content')

<section class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-cote.jpg')}});">
    <div class="h-full w-full bg-gray-950 bg-opacity-40">

        <div class="max-w-4xl mx-auto p-4 opacity-95">
            <div class="breadcrumbs font-montserrat text-base text-white">
            <ul>
                <li><a href="{{ route('accueil') }}" class="font-bold hover:text-teal-500">Accueil</a></li>
                <li>Voitures</li>
            </ul>
            </div>

            @include('composants.landingFormulaire')

        </div>
    </div>
</section>


<article class="w-full bg-slate-200">


    <h2 class="w-fit mx-auto md:text-3xl max-md:text-2xl font-montserrat font-semibold text-center py-6 text-transparent bg-clip-text bg-gradient-to-r from-sky-500 via-cyan-600 to-teal-500">Nos Voitures</h2>

    <section class="max-w-7xl mx-auto bg-white rounded-lg shadow-md ">

        <div class="w-full grid grid-cols-2 max-md:grid-cols-1 gap-4 font-cabin p-4">
            <div class="flex flex-col items-center p-3 gap-2">
                <img src="{{ asset('images/composants/two-hands-shaking-600x400.jpg')}}" alt="two-hands-shaking-600x400.jpg" class="object-cover rounded-md">
                <div class="text-center flex flex-col items-center pt-4">
                    <h4 class="text-xl font-semibold mb-2 font-montserrat text-mediumBlue">Une Expérience de Location Simplifiée</h4>
                    <p class="">Notre processus de location est simple et rapide. Réservez en ligne en quelques clics et récupérez votre voiture dans l'une de nos nombreuses agences à travers le Maroc. Nous nous occupons de tout pour que vous puissiez profiter de votre voyage en toute sérénité.</p>
                </div>
            </div>
            <div class="flex flex-col items-center p-3 gap-2">
                <img src="{{ asset('images/composants/voiture-maintenance-600x400.jpg')}}" alt="voiture-maintenance-600x400.jpg" class="object-cover rounded-md">
                <div class="text-center flex flex-col items-center pt-4">
                    <h4 class="text-xl font-semibold mb-2 font-montserrat text-mediumBlue">Un Service Client Dédié</h4>
                    <p class="">Notre équipe de service client est disponible 24/7 pour répondre à toutes vos questions et vous aider en cas de besoin. Votre satisfaction est notre priorité.</p>
                </div>
            </div>
            <div class="flex flex-col items-center p-3 gap-2">
                <img src="{{ asset('images/composants/compteur-vitesse-voiture-600x400.jpg')}}" alt="compteur-vitesse-voiture-600x400.jpg" class="object-cover rounded-md">
                <div class="text-center flex flex-col items-center pt-4">
                    <h4 class="text-xl font-semibold mb-2 font-montserrat text-mediumBlue">Des Voitures Adaptées à Vos Besoins</h4>
                    <p class="">DriveEase propose une large gamme de véhicules pour répondre à tous vos besoins de déplacement au Maroc. Que vous ayez besoin d'une petite voiture pour la ville, d'un SUV pour les routes de montagne, ou d'une voiture de luxe pour des occasions spéciales, nous avons ce qu'il vous faut.</p>
                </div>
            </div>
            <div class="flex flex-col items-center p-3 gap-2">
                <img src="{{ asset('images/composants/homme-conduisant-devant-soleil-600x400.jpg')}}" alt="homme-conduisant-devant-soleil-600x400.jpg" class="object-cover rounded-md">
                <div class="text-center flex flex-col items-center pt-4">
                    <h4 class="text-xl font-semibold mb-2 font-montserrat text-mediumBlue">Des Tarifs Compétitifs</h4>
                    <p class="">Chez DriveEase, nous proposons des tarifs compétitifs sans compromettre la qualité de notre service. Profitez de nos offres spéciales et de nos réductions pour les locations de longue durée.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-6 font-cabin">


        <h3 class="text-3xl font-semibold font-montserrat text-center text-transparent bg-clip-text bg-gradient-to-r from-mediumBlue to-lightBlue py-8">Témoignages de Nos Clients</h3>

        <p class="text-lg text-center text-darkBlue p-3">
            Découvrez ce que nos clients disent de leur expérience avec nous.<br>
             Leurs témoignages authentiques reflètent notre engagement à offrir une expérience de location de voiture sans stress et agréable. Lisez leurs retours pour voir comment DriveEase a fait la différence pour eux.
        </p>

        <div class="scroller" data-animated="true">
            <div class="tag-list scroller__inner flex flex-row justify-center py-4">
                <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                    <p class="mb-2">"DriveEase m'a offert une expérience de location incroyable. La voiture était en parfait état et le service était exceptionnel. Je recommande vivement!"</p>
                    <p class="font-semibold italic">- Ahmed, Casablanca</p>
                </div>
                <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                    <p class="mb-2">"Louer une voiture avec DriveEase a été facile et rapide. Leur support client est très réactif et utile. Merci pour ce service de qualité!"</p>
                    <p class="font-semibold italic">- Fatima, Marrakech</p>
                </div>
                <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                    <p class="mb-2">"Les prix sont très compétitifs et la qualité des voitures est excellente. Je louerai à nouveau avec DriveEase pour mes prochains voyages."</p>
                    <p class="font-semibold italic">- Youssef, Rabat</p>
                </div>
                <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                    <p class="mb-2">"J'ai loué une voiture de luxe pour une occasion spéciale et l'expérience a été mémorable. Merci DriveEase pour ce service impeccable!"</p>
                    <p class="font-semibold italic">- Salma, Tanger</p>
                </div>
            </div>
        </div>

    </section>

    <section class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-interieur.jpg')}});">
        <div class="h-full w-full bg-gray-950 bg-opacity-40">
            <div class="max-w-4xl mx-auto p-4 flex flex-col items-center align-middle justify-center min-h-72">
                <h2 class="text-2xl p-2 font-montserrat font-semibold text-white text-center py-4">Êtes-vous prêt(e) pour l'aventure ?</h2>
                <button x-data @click="window.scrollTo({ top: 0, behavior: 'smooth' })" class="bg-gradient-to-r from-mediumBlue to-lightBlue hover:saturate-150 text-white font-semibold font-montserrat py-2 px-6 text-lg rounded-lg transition-all">Je réserve</button>
            </div>
        </div>
    </section>
    

</article>
@endsection