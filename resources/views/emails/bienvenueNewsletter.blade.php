<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue au Newsletter DriveEase !</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
     <style>
        :root {
            --lightBlue: #51C3BC;
            --mediumBlue: #176B87;
            --darkBlue: #053B50;
            --teal200: #99f6e4;
            --teal950: #134e4a;
            --cyan200: #a5f3fc;
            --slate100: #f1f5f9;
            --slate300: #cbd5e1;
            --slate600: #475569;
            --teal700: #0f766e;
            --gray600: #4b5563;
            --whiteBlue: #dbeafe;
            --lightBlueHover: #bfdbfe;
            --shadowColor: rgba(0, 0, 0, 0.1);
        }
        
        * {
            font-family: "Cabin", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
        
        body {
            background-color: var(--slate300);
            color: var(--darkBlue);
            padding: 1rem;
        }
        
        article {
            max-width: 64rem;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            background-color: var(--slate100);
            border-bottom-right-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            text-align: center;
            box-shadow: 0 10px 15px -3px var(--shadowColor), 0 4px 6px -2px var(--shadowColor);
        }
        
        footer {
            text-align: center;
            padding: 1rem 0;
            font-size: 0.875rem;
            line-height: 1.25rem;
            color: var(--slate600);
        }
        
        .first-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background-color: var(--mediumBlue);
            border-bottom-right-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        
        .first-section div {
            display: flex;
            align-items: center;
        }
        
        .first-section img {
            filter: invert(1);
            height: 1.75rem;
            width: auto;
        }
        
        .first-section a {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--whiteBlue);
            margin-left: 0.5rem;
            text-decoration: none;
        }
        
        .first-section a:hover {
            color: var(--lightBlueHover);
        }
        
        .first-section span{
            color:white
        }
        
        .second-section {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 2rem 1rem;
        }
        
        .second-section h1 {
            font-family: "Montserrat", sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
        }
        
        .third-section {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--mediumBlue);
            color: white;
            padding: 1rem;
        }
        
        .third-section img {
            object-fit: contain;
            object-position: center;
            width: 100%;
            height: auto;
        }
        
        .third-section-1 {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 0.5rem;
            justify-content: center;
            align-items: center;
        }
        
        .third-section-1 h2 {
            font-family: "Montserrat", sans-serif;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--teal200);
        }
        
        .third-section-1 p {
            color: white;
        }
        
        .third-section-1 p i {
            color: var(--teal200);
        }
        
        .fourth-section {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            align-items: center;
            background-color: var(--slate100);
            color: var(--teal950);
            padding: 1rem;
        }
        
        .fourth-section-1 {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 0.5rem;
            justify-content: center;
            align-items: center;
        }
        
        .fourth-section-1 h2 {
            font-family: "Montserrat", sans-serif;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray600);
        }
        
        .fourth-section img {
            object-fit: contain;
            object-position: center;
            width:100%;
            order: -1;
        }
        
        .fifth-section {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            justify-content: center;
            align-items: center;
            padding: 1.25rem;
            color: white;
            background-color: rgba(15, 118, 110, 0.85);
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
        
        .fifth-section h2 {
            font-family: "Montserrat", sans-serif;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--cyan200);
        }
        
        .fifth-section p {
            text-align: center;
            color: white;
        }
        
        .fifth-section a {
            display: block;
            margin: 1rem auto;
            padding: 0.5rem 1rem;
            font-family: "Montserrat", sans-serif;
            background-color: white;
            color: var(--mediumBlue);
            font-weight: 600;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px var(--shadowColor), 0 4px 6px -2px var(--shadowColor);
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .fifth-section a:hover {
            background-color: var(--lightBlue);
            color: white;
        }
        
        @media not all and (min-width: 768px) {
            .logo{
                display: none;
            }
        }
        
        @media not all and (min-width: 768px) {
            .third-section, .fourth-section {
                flex-direction: column;
            }
        }
     </style>
</head>
<body>
    <article>
        <section class="first-section">
            <div>
                <a href="#"><img src="images/logo.png" alt="logo"></a>
                <a class="logo" href="#">DriveEase</a>
            </div>
            <span>{{ $email }}</span>
        </section>
        <section class="second-section">
            <h1>Bienvenue au Newsletter DriveEase !</h1>
            <p>Vous recevrez des offres exclusives, des réductions spéciales et des nouvelles sur nos dernières arrivées de voitures.<br>
                Vous découvrirez également des conseils pratiques pour voyager en toute sérénité, des itinéraires de voyage recommandés, et des témoignages de nos clients satisfaits.<br>
                Ne manquez pas nos promotions limitées et soyez les premiers informés de nos nouveautés.</p>
        </section>
        <section class="third-section">
            <img src="images/blue-four-wheel-drive-hyundai-tucson-car-400w.png" alt="blue-four-wheel-drive-hyundai-tucson-car" loading="lazy" >
            <section class="third-section-1">
                <h2>Hyundai Tucson est maintenant disponible !</h2>
                <p>Pour l'été 2024, DriveEase vous promet de nouvelles gammes de voitures et c'est hyundai qui s'offre à vous avec la nouvelle Hyundai Tucson disponible
                     <i>( -15% du prix du voiture / Jour )</i> à Agadir, Marrakech et Casablanca en nombre limitée!</p>
            </section>
        </section>
        <section class="fourth-section">
            <section class="fourth-section-1">
                <h2>La BMW Série 1 fait son retour !</h2>
                <p>Profitez du retour de la BMW 1ère série chez DriveEase, disponible à Marrakech et Casablanca. Réservez dès maintenant pour vivre une expérience de conduite exceptionnelle !</p>
            </section>
            <img src="images/blue-shiny-bmw-car-400w.png" alt="blue-shiny-bmw-car" loading="lazy">
        </section>
        <section class="fifth-section">
            <h2>Profitez de nos offres !</h2>
            <p>Profitez de ces offres le long de vos vacances ( offres disponibles du 01 Juin 2024 à 01 Septembre 2024), Les voitures apparaitront selon leur disponibilité après avoir rempli la formulaire d'accueil.<br>
            les prix de location sont automatiquement mis à jour incluant le solde.</p>
            <a href="#"  >Réserver maintenant</a>
        </section>
    </article>

    <footer>
        &copy; 2024 DriveEase. Ceci est une entreprise fictive.
    </footer>
    
</body>
</html>