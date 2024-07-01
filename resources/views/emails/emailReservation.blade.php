<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[DriveEase] Confirmation de réservation</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="bg-slate-200 text-darkBlue p-3">
    <main class="container max-w-5xl mx-auto flex flex-col gap-2 px-4 py-4 bg-white font-cabin rounded-lg shadow-lg text-center">
        <section class="py-6 flex flex-col">
            <h1 class="text-2xl font-semibold font-montserrat text-teal-600 py-3">Merci pour Votre Réservation !</h1>
            <p class="text-lg">Bonjour {{ $conducteur->prenom }},</p>
            <p class="text-lg">Votre réservation de voiture a été crée avec succès.</p>
        </section>

        {{-- Section Réservation --}}
        <h2 class="font-semibold text-mediumBlue text-lg pt-5 font-montserrat">Réservation</h2>
        <section class="grid md:grid-cols-2 max-md:grid-cols-1 justify-center gap-4 align-center">
            <div class="bg-slate-100 bg-opacity-100 rounded-xl p-3 border border-opacity-50 border-mediumBlue">
                <h3 class="font-semibold text-center font-montserrat text-mediumBlue ">Départ</h3>
                <ul class="flex flex-col gap-2 justify-center align-center p-2">
                    <li>Date de Départ <b class="mx-2">{{ $dateDepartDt }}</b></li>
                    <li>Lieu de Départ <b class="mx-2">{{ $reservation->lieuDepart }}</b></li>
                </ul>
            </div>
            <div class="bg-slate-100 bg-opacity-100 rounded-xl p-3 border border-opacity-50 border-mediumBlue">
                <h3 class="font-semibold text-center font-montserrat text-mediumBlue">Retour</h3>
                <ul class="flex flex-col gap-2 justify-center align-center p-2">
                    <li>Date de Retour <b class="mx-2">{{ $dateRetourDt }}</b></li>
                    <li>Lieu de Retour <b class="mx-2">{{ $reservation->lieuRetour }}</b></li>
                </ul>
            </div>
        </section>


        {{-- Section Voiture --}}
        <h2 class="font-semibold text-mediumBlue text-lg pt-5 font-montserrat">Voiture</h2>
        <section class="grid md:grid-cols-3 max-md:grid-cols-1 gap-4 justify-center align-center p-4 bg-slate-100 bg-opacity-50 rounded-xl border border-opacity-50 border-mediumBlue">
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="{{ $voiture->photo }}" class="object-center object-contain w-full">
            <ul class="flex flex-col gap-2 text-left font-cabin p-2">
                <li class="text-lg font-semibold max-md:text-center">{{ $voiture->modele }}</li>
                <li><img src="{{ asset('images/icons/personne.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-2"></img>{{ $voiture->nbPers }} sièges</li>
                <li><img src="{{ asset('images/icons/transmission.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-2"></img>Transmission {{ $voiture->transmission }}</li>
                @if( $voiture->climatisation == true )
                <li><img src="{{ asset('images/icons/climatisation.svg')}}" class="md:w-7 md:h-7 w-6 h-6 align-middle inline-block mr-2"></img>Climatisation</li>
                @endif
            </ul>
            <ul class="flex flex-col gap-2 text-right font-cabin p-2">
                <li>Prix Journalier &nbsp;<b>{{ $voiture->prix }} DH/Jour</b></li>
                <li>Durée &nbsp;<b>{{ $nbJrs }} Jours</b></li>
                <li class="py-2 border-t border-slate-400">Prix de Location &nbsp;<b class="text-teal-700">{{ $nbJrs*$voiture->prix }} DH</b></li>
            </ul>        
        </section>

        {{-- Section Protection & Options --}}
        <h2 class="font-semibold text-mediumBlue text-lg pt-5 font-montserrat">Protection</h2>
        <section  class="grid grid-cols-1 justify-center gap-4 align-center p-4 bg-slate-100 bg-opacity-50 rounded-xl border border-opacity-50 border-mediumBlue">
            <h3 class="font-semibold text-center font-montserrat text-mediumBlue">Protection {{ $protection->type }}</h3>
            <ul class="flex flex-col gap-2 justify-center align-center  ">
                <li>Prix de la caution <b class="mx-2">{{ $protection->prixCaution }} DH</b></li>
                <li>Prix de la franchise <b class="mx-2">{{ $protection->prixFranchise }} DH</b></li>
                <li>Prix Journalier &nbsp;<b class="mx-2">{{ $protection->prix }} DH/Jour</b></li>
                <li class="py-2 border-t border-slate-400">Prix de Protection &nbsp;<b class="text-teal-700">{{ $protection->prix* $nbJrs }} DH</b></li>

            </ul>
        </section>

        @if(!empty($options))
            <h2 class="font-semibold text-mediumBlue text-lg pt-5 font-montserrat">Options</h2>
            <section  class="flex md:flex-row max-md:flex-col justify-center gap-4 align-center">
                @foreach ($options as $option)
                    <ul class="flex flex-col gap-2 justify-center align-center p-4 bg-slate-100 bg-opacity-50 rounded-xl border border-opacity-50 border-mediumBlue">
                        <h3 class="font-semibold text-center font-montserrat text-mediumBlue">{{ $option->option }}</h3>
                        <li>{{ $option->description }}</li>
                        <li class="py-2 border-t border-slate-400">Prix de l'Option<b class="text-teal-700 mx-2">{{ $option->prix }} DH</b></li>
                    </ul>
                @endforeach
            </section>
        @endif

        <h2 class="font-semibold text-mediumBlue text-lg pt-5 font-montserrat">Conducteur</h2>
        <section  class="grid grid-cols-1 justify-center gap-4 align-center p-4 bg-slate-100 bg-opacity-50 rounded-xl border border-opacity-50 border-mediumBlue">
            <ul class="flex flex-col gap-2 justify-center align-center">
                
                <li>Nom <b class="mx-2 uppercase">{{ $conducteur->nom }}</b></li>
                <li>Prénom <b class="mx-2 uppercase">{{ $conducteur->prenom }}</b></li>
                <li>Date de Naissance <b class="mx-2">{{ $conducteur->date_naissance }}</b></li>
                <li>Num de Tél <i class="opacity-70 text-teal-700">( National +212 )</i><b class="mx-2">{{ $conducteur->num_tel }}</b></li>
                <li>E-mail<b class="mx-2">{{ $conducteur->email }}</b></li>
            </ul>
        </section>

        <h1 class="p-3 font-semibold text-lg font-montserrat">Prix Total <b class="text-teal-600">{{ $reservation->prixTotal }} DH</b></h1>

        <p class="pt-2">Merci de nous avoir choisis pour votre location de voiture.</p>
        <p class="pb-2">Cordialement, l'équipe <b>DriveEase</b></p>

    </main>
    <footer>

    </footer>
</body>
</html>
