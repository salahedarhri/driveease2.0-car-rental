<article x-data="{  scrollFocus(){ const element = document.getElementById('lieuDepart');
                    window.scrollTo({ top:0, behavior:'smooth'});  setTimeout(()=>element.focus(), 400);   }}"
        class="w-full bg-slate-200">

    {{-- Formulaire d'accueil --}}
    <section class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-cote.jpg')}}); ">
        <div class="h-full w-full bg-gray-950 bg-opacity-40">

            <div class="max-w-4xl mx-auto px-4 py-8">
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

    {{-- Section Voitures --}}
    <section class="max-w-6xl mx-auto py-6">
        <h1 class="w-fit mx-auto md:text-3xl max-md:text-2xl font-montserrat font-semibold text-center text-mediumBlue py-4">Nos Voitures</h1>
        <div class="w-full grid md:grid-cols-2 max-md:grid-cols-1 md:gap-6 max-md:gap-4 font-cabin p-2 bg-white rounded-lg shadow-lg">
            <section class="flex flex-col items-center p-3 gap-2">
                <img loading="lazy" src="{{ asset('images/composants/two-hands-shaking-600x400.jpg')}}" alt="two-hands-shaking-600x400.jpg" class="object-cover rounded-md">
                <div class="max-md:text-center flex flex-col items-center pt-4">
                    <h3 class="text-xl font-semibold mb-2 font-montserrat text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Une Expérience de Location Simplifiée</h3>
                    <p class="p-2 text-md indent-4 text-justify">Notre processus de location est simple et rapide. Réservez en ligne en quelques clics et récupérez votre voiture dans l'une de nos nombreuses agences à travers le Maroc.<br>
                         Nous nous occupons de tout pour que vous puissiez profiter de votre voyage en toute sérénité.</p>
                </div>
            </section>
            <section class="flex flex-col items-center p-3 gap-2">
                <img loading="lazy" src="{{ asset('images/composants/voiture-maintenance-600x400.jpg')}}" alt="voiture-maintenance-600x400.jpg" class="object-cover rounded-md">
                <div class="max-md:text-center flex flex-col items-center pt-4">
                    <h3 class="text-xl font-semibold mb-2 font-montserrat text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Un Service Client Dédié</h3>
                    <p class="p-2 text-md indent-4 text-justify">Notre équipe de service client est disponible 24/7 pour répondre à toutes vos questions et vous aider en cas de besoin. Votre satisfaction est notre priorité.</p>
                </div>
            </section>
            <section class="flex flex-col items-center p-3 gap-2">
                <img loading="lazy" src="{{ asset('images/composants/compteur-vitesse-voiture-600x400.jpg')}}" alt="compteur-vitesse-voiture-600x400.jpg" class="object-cover rounded-md">
                <div class="max-md:text-center flex flex-col items-center pt-4">
                    <h3 class="text-xl font-semibold mb-2 font-montserrat text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Des Voitures Adaptées à Vos Besoins</h3>
                    <p class="p-2 text-md indent-4 text-justify">DriveEase propose une large gamme de véhicules pour répondre à tous vos besoins de déplacement au Maroc.<br>
                            Que vous ayez besoin d'une petite voiture pour la ville, d'un SUV pour les routes de montagne, ou d'une voiture de luxe pour des occasions spéciales, nous avons ce qu'il vous faut.</p>
                </div>
            </section>
            <section class="flex flex-col items-center p-3 gap-2">
                <img loading="lazy" src="{{ asset('images/composants/homme-conduisant-devant-soleil-600x400.jpg')}}" alt="homme-conduisant-devant-soleil-600x400.jpg" class="object-cover rounded-md">
                <div class="max-md:text-center flex flex-col items-center pt-4">
                    <h3 class="text-xl font-semibold mb-2 font-montserrat text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Des Tarifs Compétitifs</h3>
                    <p class="p-2 text-md indent-4 text-justify">Chez DriveEase, nous proposons des tarifs compétitifs sans compromettre la qualité de notre service.<br>Profitez de nos offres spéciales et de nos réductions pour les locations de longue durée.</p>
                </div>
            </section>
        </div>
    </section>

    {{-- Temoignage --}}
    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto py-12 px-2 font-cabin">
            <h3 class="text-3xl font-semibold font-montserrat text-center text-transparent bg-clip-text bg-mediumBlue py-5 max-sm:text-2xl">Témoignages de Nos Clients</h3>
    
            <p class="md:text-lg text-center text-darkBlue py-5">
                Découvrez ce que nos clients disent de leur expérience avec nous.<br>
                Leurs témoignages authentiques reflètent notre engagement à offrir une expérience de location de voiture sans stress et agréable. Lisez leurs retours pour voir comment DriveEase a fait la différence pour eux.
            </p>
    
            <div class="scroller" data-animated="true">
                <div class="tag-list scroller__inner flex flex-row justify-center">
                    <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                        <p class="mb-2 text-justify">"DriveEase m'a offert une expérience de location incroyable. La voiture était en parfait état et le service était exceptionnel. Je recommande vivement!"</p>
                        <p class="font-semibold italic">- Ahmed, Casablanca</p>
                    </div>
                    <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                        <p class="mb-2 text-justify">"Louer une voiture avec DriveEase a été facile et rapide. Leur support client est très réactif et utile. Merci pour ce service de qualité!"</p>
                        <p class="font-semibold italic">- Fatima, Marrakech</p>
                    </div>
                    <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                        <p class="mb-2 text-justify">"Les prix sont très compétitifs et la qualité des voitures est excellente. Je louerai à nouveau avec DriveEase pour mes prochains voyages."</p>
                        <p class="font-semibold italic">- Youssef, Rabat</p>
                    </div>
                    <div class="p-4 border rounded-lg shadow-lg border-darkBlue border-opacity-50 bg-lightBlue bg-opacity-40 text-darkBlue max-md:w-80 md:w-96">
                        <p class="mb-2 text-justify">"J'ai loué une voiture de luxe pour une occasion spéciale et l'expérience a été mémorable. Merci DriveEase pour ce service impeccable!"</p>
                        <p class="font-semibold italic">- Salma, Tanger</p>
                    </div>
                </div>
            </div>
    
        </div>
    </section>

    {{-- Scroll top --}}
    <section class="h-full w-full mx-auto bg-cover bg-center"  style="background-image:url({{asset('images/composants/voiture-interieur.jpg')}});">
        <div class="h-full w-full bg-gray-950 bg-opacity-40">
            <div class="max-w-4xl mx-auto p-4 flex flex-col items-center align-middle justify-center md:h-largeHeight max-md:h-96">
                <h2 class="md:text-2xl max-md:text-xl p-2 font-montserrat font-semibold text-white text-center py-4">Êtes-vous prêt(e) pour l'aventure ?</h2>
                <button @click="scrollFocus()" class="bg-gradient-to-r from-mediumBlue to-lightBlue hover:saturate-150 text-white font-semibold font-montserrat py-2 px-6 md:text-lg max-md:text-base rounded-lg transition-all">Je réserve</button>
            </div>
        </div>
    </section>

</article>
    