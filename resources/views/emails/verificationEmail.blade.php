<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vérification de l'adresse email</title>
    <style>
        body {
            background-color: #e8f5ff; /* bleuclair */
            color: #053B50; /* darkBlue */
            padding: 1rem;
            font-family: 'Cabin', sans-serif;
            margin: 0;
            text-align: center;
        }
        header {
            background-color: #176B87; /* mediumBlue */
            color: white; /* whiteBlue */
            padding: 1rem;
            border-radius: 0.5rem 0.5rem 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        header img {
            filter: invert(1);
            height: 1.75rem;
            width: auto;
        }
        header a {
            text-decoration: none;
            color: white; /* whiteBlue */
            font-weight: 600;
            font-size: 1.25rem;
        }
        main {
            background-color: #f8fafc; /* Slate 100 */
            border-radius: 0 0 0.5rem 0.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin: 0 auto;
            max-width: 600px;
        }
        h1 {
            color: #176B87; /* mediumBlue */
            font-size: 1.25rem;
            font-weight: 700;
            margin: 1rem 0;
        }
        a.button {
            background: linear-gradient(90deg, #51C3BC, #51C3BC); /* Gradient from lightBlue */
            color: #ffffff;
            font-weight: 600;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
            display: inline-block;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        a.button:hover {
            filter: saturate(150%);
        }
        footer {
            text-align: center;
            padding: 1.5rem;
            color: #1b1b22; /* bleufonce */
            font-size: 0.875rem;
        }
    </style>
</head>
<body >
    <header>
        <a href="{{ route('accueil')}}">
            <img src="{{ asset('images/composants/logo.png') }}" alt="logo">
        </a>
        <a href="{{ route('accueil')}}">DriveEase</a>
    </header>
    <main style="text-align:center;">
        <h1>Vérification de votre adresse email</h1>
        <p>Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.</p>
        <a href="{{ $url }}" class="button">Vérifier l'adresse email</a>
        <p>Si vous n'avez pas créé de compte, aucune action supplémentaire n'est nécessaire.</p>
    </main>
    <footer>
        &copy; 2024 DriveEase. Ceci est une entreprise fictive.
    </footer>
</body>
</html>
