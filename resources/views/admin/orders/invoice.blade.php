<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">
    <head>
        <title>Inter-Media Informatique</title>
        <!--meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>SAV INTERN MEDIA</h1>
    <h2>IMMEUBLE BCHIR [EN FACE DE CENTRE MEDICAL RUSPINA]</h2>
    <P>
        Tel: 27 400 851 / 56 172 172 <br>
        CCB: LE MONANT DE DIAGNOSTIQUE SERA ETRE FACTURER 10 DT <br>
        TVA: INTER MEDIA SE DEGAGE DE TOUTE RESONSBILITE <br>
        RC: POR MATERIELS PLUS DE TROIS MOIS
    </P>
    <div class="container">
        <style>
            table {
                display: inline-table;
            }
        </style>
        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">FICHE TEHNIQUE</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Numero</td>
                    <td style="border: 1px solid">Date</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">{{ $order->id }}</td>
                    <td style="border: 1px solid">{{ now()->toDateString() }}</td>
                </tr>
            </tbody>
        </table>
        
        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">CLIENT</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Code</td>
                    <td style="border: 1px solid">{{ $order->client_id }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Nom</td>
                    <td style="border: 1px solid">{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Email</td>
                    <td style="border: 1px solid">{{ $order->client->details->email }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Adresse</td>
                    <td style="border: 1px solid">{{ $order->client->details->address }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Tel</td>
                    <td style="border: 1px solid">{{ $order->client->details->phone }}</td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">Machine</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Code</td>
                    <td style="border: 1px solid">{{ $order->breakdown->device->id}}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Panne</td>
                    <td style="border: 1px solid">{{ $order->breakdown->title }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Nature</td>
                    <td style="border: 1px solid">{{ $order->nature }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Payee</td>
                    <td style="border: 1px solid">
                        @if($order->payment->payed) Oui @else Non @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>SAV INTERN MEDIA</h1>
    <h2>IMMEUBLE BCHIR [EN FACE DE CENTRE MEDICAL RUSPINA]</h2>
    <P>
        Tel: 27 400 851 / 56 172 172
        <br> CCB: LE MONANT DE DIAGNOSTIQUE SERA ETRE FACTURER 10 DT
        <br> TVA: INTER MEDIA SE DEGAGE DE TOUTE RESONSBILITE
        <br> RC: POR MATERIELS PLUS DE TROIS MOIS
    </P>
    <div class="container">
        <style>
            table {
                display: inline-table;
            }
        </style>
        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">FICHE TEHNIQUE</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Numero</td>
                    <td style="border: 1px solid">Date</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">{{ $order->id }}</td>
                    <td style="border: 1px solid">{{ now()->toDateString() }}</td>
                </tr>
            </tbody>
        </table>
    
        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">CLIENT</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Code</td>
                    <td style="border: 1px solid">{{ $order->client_id }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Nom</td>
                    <td style="border: 1px solid">{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Email</td>
                    <td style="border: 1px solid">{{ $order->client->details->email }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Adresse</td>
                    <td style="border: 1px solid">{{ $order->client->details->address }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Tel</td>
                    <td style="border: 1px solid">{{ $order->client->details->phone }}</td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid">
            <thead>
                <th style="background-color:darkgray">Machine</th>
            </thead>
            <tbody>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Code</td>
                    <td style="border: 1px solid">{{ $order->breakdown->device->id}}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Panne</td>
                    <td style="border: 1px solid">{{ $order->breakdown->title }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Nature</td>
                    <td style="border: 1px solid">{{ $order->nature }}</td>
                </tr>
                <tr style="border: 1px solid">
                    <td style="border: 1px solid">Payee</td>
                    <td style="border: 1px solid">
                        @if($order->payment->payed) Oui @else Non @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>