<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande prête</title>
</head>
<body>
    <h2>Bonjour {{ $commande->user->name }},</h2>

    <p>Nous avons le plaisir de vous informer que votre commande <strong>#{{ $commande->id }}</strong> est maintenant <strong>prête</strong>.</p>

    <p>Détails de la commande :</p>
    <ul>
            @foreach ($commande->products as $produit)
                <li>{{ $produit->name }} - Quantité : {{ $produit->pivot->quantite }}</li>
            @endforeach
        </ul>
            <p>Merci de votre confiance,</p>
    <p>L’équipe {{ config('app.name') }}</p>
</body>
</html>
