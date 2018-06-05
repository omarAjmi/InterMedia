<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <table style="border: 1px dashed">
        <thead >
            <th style="background-color:darkgray">FICHE TEHNIQUE</th>
        </thead>
        <tbody >
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Numero</td>
                <td style="border: 1px dashed">Date</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">000123</td>
                <td style="border: 1px dashed">{{ now()->toDateString() }}</td>
            </tr>
        </tbody>
    </table><br><br>

    <table style="border: 1px dashed">
        <thead>
            <th style="background-color:darkgray">CLIENT</th>
        </thead>
        <tbody>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Code</td>
                <td style="border: 1px dashed">{{ $order->client_id }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Nom</td>
                <td style="border: 1px dashed">{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Email</td>
                <td style="border: 1px dashed">{{ $order->client->details->email }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Adresse</td>
                <td style="border: 1px dashed">{{ $order->client->details->address }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Tel</td>
                <td style="border: 1px dashed">{{ $order->client->details->phone }}</td>
            </tr>
        </tbody>
    </table><br><br>

    <table style="border: 1px dashed">
        <thead>
            <th style="background-color:darkgray">Machine</th>
        </thead>
        <tbody>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Code</td>
                <td style="border: 1px dashed">{{ $order->breakdown->device->id}}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Panne</td>
                <td style="border: 1px dashed">{{ $order->breakdown->title }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Nature</td>
                <td style="border: 1px dashed">{{ $order->nature }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Payee</td>
                <td style="border: 1px dashed">
                    @if($order->payment->payed)
                        Oui
                    @else
                        Non
                    @endif
                </td>
            </tr>
        </tbody>
    </table><br><br><br>

    <h1>SAV INTERN MEDIA</h1>
    <h2>IMMEUBLE BCHIR [EN FACE DE CENTRE MEDICAL RUSPINA]</h2>
    <P>
        Tel: 27 400 851 / 56 172 172
        <br> CCB: LE MONANT DE DIAGNOSTIQUE SERA ETRE FACTURER 10 DT
        <br> TVA: INTER MEDIA SE DEGAGE DE TOUTE RESONSBILITE
        <br> RC: POR MATERIELS PLUS DE TROIS MOIS
    </P>
    <table style="border: 1px dashed">
        <thead>
            <th style="background-color:darkgray">FICHE TEHNIQUE</th>
        </thead>
        <tbody>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Numero</td>
                <td style="border: 1px dashed">Date</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">000123</td>
                <td style="border: 1px dashed">{{ now()->toDateString() }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    
    <table style="border: 1px dashed">
        <thead>
            <th style="background-color:darkgray">CLIENT</th>
        </thead>
        <tbody>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Code</td>
                <td style="border: 1px dashed">{{ $order->client_id }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Nom</td>
                <td style="border: 1px dashed">{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Email</td>
                <td style="border: 1px dashed">{{ $order->client->details->email }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Adresse</td>
                <td style="border: 1px dashed">{{ $order->client->details->address }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Tel</td>
                <td style="border: 1px dashed">{{ $order->client->details->phone }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    
    <table style="border: 1px dashed">
        <thead>
            <th style="background-color:darkgray">Machine</th>
        </thead>
        <tbody>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Code</td>
                <td style="border: 1px dashed">{{ $order->breakdown->device->id}}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Panne</td>
                <td style="border: 1px dashed">{{ $order->breakdown->title }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Nature</td>
                <td style="border: 1px dashed">{{ $order->nature }}</td>
            </tr>
            <tr style="border: 1px dashed">
                <td style="border: 1px dashed">Payee</td>
                <td style="border: 1px dashed">
                    @if($order->payment->payed) Oui @else Non @endif
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>