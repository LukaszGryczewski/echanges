<!DOCTYPE html>
<html>
<head>
    <title>Notification concernant votre compte sur GeekTreasures</title>
</head>
<body>
    <p>Cher(e) {{ $details['username'] }},</p>

    <p>Nous espérons que vous allez bien. Nous vous contactons pour vous informer qu'après un examen minutieux, nous avons décidé de bloquer temporairement votre compte sur GeekTreasures pour les raisons suivantes :</p>

    <blockquote>
        {{ $details['reason'] }}
    </blockquote>

    <p>Nous comprenons que cette situation peut être frustrante. Si vous estimez que cette action a été prise par erreur ou souhaitez obtenir des éclaircissements, n'hésitez pas à nous contacter à l'adresse "GeekTreasures@gmail.com".</p>

    <p>La sécurité et l'intégrité de notre communauté sont de la plus haute importance pour nous. Nous prenons ces mesures pour assurer un environnement sûr et respectueux pour tous nos utilisateurs.</p>

    <p>Merci de votre compréhension et de votre coopération.</p>

    <p>Cordialement,</p>
    <p>L'équipe GeekTreasures</p>
</body>
</html>
