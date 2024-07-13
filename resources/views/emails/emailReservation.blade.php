<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[DriveEase] Confirmation de réservation</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container {
                padding: 16px !important;
            }
            .grid-2 {
                grid-template-columns: 1fr !important;
            }
            .grid-3 {
                grid-template-columns: 1fr !important;
            }
            .text-left, .text-right {
                text-align: center !important;
            }
            .p-4, .pt-4 {
                padding: 16px !important;
            }
        }
    </style>
</head>
<body style="background-color: #EEEEEE; color: #053B50; padding: 4px;">
    <main class="container" style="max-width: 640px; margin: 0 auto; display: flex; flex-direction: column; gap: 8px; padding: 16px; background-color: #ffffff; font-family: 'Cabin', sans-serif; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
        <section style="padding-top: 24px; display: flex; flex-direction: column;">
            <h1 style="font-size: 1.5rem; font-weight: 600; font-family: 'Montserrat', sans-serif; color: #51C3BC; padding-top: 12px;">Merci pour Votre Réservation !</h1>
            <p style="font-size: 1.125rem;">Bonjour {{ $conducteur->prenom }},</p>
            <p style="font-size: 1.125rem;">Votre réservation de voiture a été crée avec succès.</p>
        </section>

        <h2 style="font-weight: 600; color: #176B87; font-size: 1.125rem; padding-top: 20px; font-family: 'Montserrat', sans-serif;">Réservation</h2>
        <section class="grid-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; justify-content: center; align-items: center;">
            <div style="background-color: #e2e8f0; border-radius: 12px; padding: 12px; border: 1px solid rgba(23, 107, 135, 0.5);">
                <h3 style="font-weight: 600; text-align: center; font-family: 'Montserrat', sans-serif; color: #176B87; list-style:none;">Départ</h3>
                <ul style="display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center; padding: 8px; list-style:none; padding-left:0; padding-right:0;">
                    <li>Date de Départ <b style="margin-left: 8px;">{{ $dateDepartDt }}</b></li>
                    <li>Lieu de Départ <b style="margin-left: 8px;">{{ $reservation->lieuDepart }}</b></li>
                </ul>
            </div>
            <div style="background-color: #e2e8f0; border-radius: 12px; padding: 12px; border: 1px solid rgba(23, 107, 135, 0.5);">
                <h3 style="font-weight: 600; text-align: center; font-family: 'Montserrat', sans-serif; color: #176B87;">Retour</h3>
                <ul style="display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center; padding: 8px; list-style:none; padding-left:0; padding-right:0;">
                    <li>Date de Retour <b style="margin-left: 8px;">{{ $dateRetourDt }}</b></li>
                    <li>Lieu de Retour <b style="margin-left: 8px;">{{ $reservation->lieuRetour }}</b></li>
                </ul>
            </div>
        </section>

        <h2 style="font-weight: 600; color: #176B87; font-size: 1.125rem; padding-top: 20px; font-family: 'Montserrat', sans-serif;">Voiture</h2>
        <section class="grid-3" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; justify-content: center; align-items: center; padding: 16px; background-color: #e2e8f0; border-radius: 12px; border: 1px solid rgba(23, 107, 135, 0.5);">
            <img src="{{ asset('images/voitures/'.$voiture->photo)}}" alt="{{ $voiture->photo }}" style="object-fit: contain; width: 100%;">
            <ul class="text-left" style="display: flex; flex-direction: column; gap: 8px; text-align: left; font-family: 'Cabin', sans-serif; padding: 8px; list-style:none; padding-left:0; padding-right:0;">
                <li style="font-size: 1.125rem; font-weight: 600;">{{ $voiture->modele }}</li>
                <li><img src="{{ asset('images/icons/personne.svg')}}" style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">{{ $voiture->nbPers }} sièges</li>
                <li><img src="{{ asset('images/icons/transmission.svg')}}" style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">Transmission {{ $voiture->transmission }}</li>
                @if( $voiture->climatisation == true )
                <li><img src="{{ asset('images/icons/climatisation.svg')}}" style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">Climatisation</li>
                @endif
            </ul>
            <ul class="text-right" style="display: flex; flex-direction: column; gap: 8px; text-align: right; font-family: 'Cabin', sans-serif; padding: 8px; list-style:none; padding-left:0; padding-right:0;">
                <li>Prix Journalier &nbsp;<b>{{ $voiture->prix }} DH/Jour</b></li>
                <li>Durée &nbsp;<b>{{ $nbJrs }} Jours</b></li>
                <li style="padding-top: 8px; border-top: 1px solid #94a3b8;">Prix de Location &nbsp;<b style="color: #51C3BC;">{{ $nbJrs*$voiture->prix }} DH</b></li>
            </ul>
        </section>

        <h2 style="font-weight: 600; color: #176B87; font-size: 1.125rem; padding-top: 20px; font-family: 'Montserrat', sans-serif;">Protection</h2>
        <section style="display: grid; grid-template-columns: 1fr; gap: 16px; justify-content: center; align-items: center; padding: 16px; background-color: #e2e8f0; border-radius: 12px; border: 1px solid rgba(23, 107, 135, 0.5);">
            <h3 style="font-weight: 600; text-align: center; font-family: 'Montserrat', sans-serif; color: #176B87;">Protection {{ $protection->type }}</h3>
            <ul style="display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center; list-style:none; padding-left:0; padding-right:0;">
                <li>Prix de la caution <b style="margin-left: 8px;">{{ $protection->prixCaution }} DH</b></li>
                <li>Prix de la franchise <b style="margin-left: 8px;">{{ $protection->prixFranchise }} DH</b></li>
                <li>Prix Journalier &nbsp;<b style="margin-left: 8px;">{{ $protection->prix }} DH/Jour</b></li>
                <li style="padding-top: 8px; border-top: 1px solid #94a3b8;">Prix de Protection &nbsp;<b style="color: #51C3BC;">{{ $protection->prix* $nbJrs }} DH</b></li>
            </ul>
        </section>

        @if(!empty($options))
            <h2 style="font-weight: 600; color: #176B87; font-size: 1.125rem; padding-top: 20px; font-family: 'Montserrat', sans-serif;">Options</h2>
            <section class="p-4" style="display: flex; flex-direction: column; gap: 16px; justify-content: center; align-items: center;">
                @foreach ($options as $option)
                    <ul style="display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center; padding: 16px; background-color: #e2e8f0; border-radius: 12px; border: 1px solid rgba(23, 107, 135, 0.5); list-style:none; padding-left:0; padding-right:0;">
                        <h3 style="font-weight: 600; text-align: center; font-family: 'Montserrat', sans-serif; color: #176B87;">{{ $option->option }}</h3>
                        <li>{{ $option->description }}</li>
                        <li style="padding-top: 8px; border-top: 1px solid #94a3b8;">Prix de l'Option <b style="color: #51C3BC; margin-left: 8px;">{{ $option->prix }} DH</b></li>
                    </ul>
                @endforeach
            </section>
        @endif

        <h2 style="font-weight: 600; color: #176B87; font-size: 1.125rem; padding-top: 20px; font-family: 'Montserrat', sans-serif;">Conducteur</h2>
        <section style="display: grid; grid-template-columns: 1fr; gap: 16px; justify-content: center; align-items: center; padding: 16px; background-color: #e2e8f0; border-radius: 12px; border: 1px solid rgba(23, 107, 135, 0.5);">
            <ul style="display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center; list-style:none; padding-left:0; padding-right:0;">
                <li>Nom <b style="margin-left: 8px; text-transform: uppercase;">{{ $conducteur->nom }}</b></li>
                <li>Prénom <b style="margin-left: 8px; text-transform: uppercase;">{{ $conducteur->prenom }}</b></li>
                <li>Date de Naissance <b style="margin-left: 8px;">{{ $conducteur->date_naissance }}</b></li>
                <li>Num de Tél <i style="opacity: 0.7; color: #51C3BC;">( National +212 )</i><b style="margin-left: 8px;">{{ $conducteur->num_tel }}</b></li>
                <li>E-mail<b style="margin-left: 8px;">{{ $conducteur->email }}</b></li>
            </ul>
        </section>

        <h1 style="padding: 12px; font-weight: 600; font-size: 1.125rem; font-family: 'Montserrat', sans-serif;">Prix Total <b style="color: #51C3BC;">{{ $reservation->prixTotal }} DH</b></h1>

        <p style="padding-top: 8px;">Merci de nous avoir choisis pour votre location de voiture.</p>
        <p style="padding-bottom: 8px;">Cordialement, l'équipe <b>DriveEase</b></p>
    </main>
    <footer style="text-align: center; padding-top: 16px; padding-bottom: 16px; font-size: 0.875rem; color: #6772e5; font-family: 'Cabin', sans-serif;">
        &copy; 2024 DriveEase. Ceci est une entreprise fictive.
    </footer>
</body>
</html>
