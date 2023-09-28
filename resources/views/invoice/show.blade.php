<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>__('Facture')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Geek Treasures</h1>
    <ul class="list-unstyled">
        <li><i class="bi bi-envelope-fill"></i> Palais du Midi 4 Rue de la Fontaine 1000 Bruxelles</li>
        <li><i class="bi bi-envelope-fill"></i> GeekTreasuresA@gmail.com</li>
        <li><i class="bi bi-telephone-fill"></i> 02/279.58.40</li>
    </ul>
    <div class="container">
        <h2>{{ __('Facture n°') }} {{ $invoice->id }}</h2>
        <p>{{ __('Commande ID') }} : {{ $invoice->order_id }}</p>
        <p>{{ __('Montant produits') }} : {{ $order->total_price - $order->shipping_cost }} {{ $invoice->currency }}</p>
        <p>{{ __('Montant livraison') }} : {{ $order->shipping_cost }} {{ $invoice->currency }}</p>
        <p>{{ __('Montant total') }} : {{ $order->total_price}} {{ $invoice->currency }}</p>
        <p>{{ __('Date de facturation') }} : {{ $invoice->billing_date }}</p>
        <p>{{ __('Adresse de livraison') }} : {{ $invoice->order->delivery_address }}</p>
        <p>{{ __('Détails') }} : {{ $invoice->details }}</p>

        <h3>{{ __('Produits commandés') }} :</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Nom du produit') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Quantité') }}</th>
                    <th>{{ __('Prix unitaire') }}</th>
                    <th>{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->unit_price }}</td>
                        <td>{{ $product->pivot->quantity * $product->pivot->unit_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
