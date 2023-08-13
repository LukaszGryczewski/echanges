<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
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
    <h1>Facture N° {{ $order->invoice->id }}</h1>
    <p>Date de facturation : {{ $order->order_date }}</p>
    <p>Adresse de livraison : {{ $order->delivery_address }}</p>
    <p>Montant : {{ $order->total_price }} EUR</p>

    <h2>Détails de la commande :</h2>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cart->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ $product->pivot->unit_price }} EUR</td>
                    <td>{{ $product->pivot->quantity * $product->pivot->unit_price }} EUR</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
