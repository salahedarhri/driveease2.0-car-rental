<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin:wght@400&family=Montserrat:wght@700&display=swap');

        body {
            font-family: 'Cabin', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #EEEEEE;
        }

        h1, h2 {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border: 1px solid #dddddd;">
        <div style="background-color: #053B50; color: #ffffff; text-align: center; padding: 20px;">
            <h1 style="margin: 0;">Confirmation de Réservation</h1>
        </div>
        <div style="padding: 20px;">
            <h2 style="color: #176B87;">Bonjour {{ $conducteur->prenom }} {{ $conducteur->nom }},</h2>
            <p>Merci pour votre réservation. Voici les détails de votre réservation :</p>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #dddddd; text-align: left;">Détails</th>
                    <th style="padding: 10px; border: 1px solid #dddddd; text-align: left;">Valeurs</th>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Lieu de Départ</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $reservation->lieuDepart }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Lieu de Retour</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $reservation->lieuRetour }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Date de Départ</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $reservation->dateDepart }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Date de Retour</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $reservation->dateRetour }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Prix Total</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $reservation->prixTotal }} DH</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Voiture</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $voiture->modele }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #dddddd;">Protection</td>
                    <td style="padding: 10px; border: 1px solid #dddddd;">{{ $protection->type }}</td>
                </tr>
                @if(!empty($options))
                    @foreach ($options as $option)
                        <tr>
                            <td style="padding: 10px; border: 1px solid #dddddd;">Option {{ $loop->index+1 }}</td>
                            <td style="padding: 10px; border: 1px solid #dddddd;">{{ $option->option }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{-- <div style="text-align: center; margin: 20px 0;">
                <a href="#" style="background-color: #176B87; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Télécharger le reçu</a>
            </div> --}}
            <div style="text-align: center; margin-top: 20px;">
                <img src="{{ asset('images/voitures/'.$voiture->photo) }}" alt="{{ $voiture->photo }}" style="max-width: 100%; height: auto; border: 1px solid #dddddd;">
            </div>
            <p>Nous espérons vous revoir bientôt.</p>
            <p>Cordialement,</p>
            <p>L'équipe de DriveEase</p>
        </div>
        <div style="text-align: center; padding: 10px; font-size: 12px; color: #666666;">
            <p>&copy; 2024 DriveEase. Ceci est une entreprise fictive.</p>
        </div>
    </div>
</body>
</html>
