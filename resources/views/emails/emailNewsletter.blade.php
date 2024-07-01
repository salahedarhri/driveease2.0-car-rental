<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Réservation</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="bg-gray-900 text-white">
    <div class="container max-w-5xl mx-auto px-4 py-8 bg-slate-500 font-montserrat">
        <h1 class="text-3xl font-semibold mb-4">Réservation de voiture</h1>
        
        <p class="mb-4">Bonjour {{ $conducteur->prenom }},</p>

        <p class="mb-4">Votre réservation de voiture a été confirmée avec succès.</p>

        <div class="mb-4">
            <p class="font-semibold">Détails de la réservation :</p>
            <ul>
                <li>Voiture : {{ $reservation->idCar }}</li>
                <li>Protection : {{ $reservation->idProtection }}</li>
                <li>Conducteur : {{ $reservation->idConducteur }}</li>

                @if(!empty($options))
                    <li>Options Sélectionnées : </li>
                    <ul class="ml-4">
                    @foreach ($options as $option)
                        <li>{{ $option->option }}</li>
                    @endforeach
                    </ul>
                @endif
            </ul>
        </div>

        <p class="mb-4">Merci de nous avoir choisis pour votre location de voiture.</p>
        
        <p class="mb-4">Cordialement,<br>DriveEase</br></p>
    </div>
</body>
</html>
