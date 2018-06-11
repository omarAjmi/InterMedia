<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">
    <head>
        <title>Inter-Media Informatique</title>
        <!--meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
       
      
        </head>
        <style>
          
            .table {
                width: 30%;
                display: inline-table;
                margin-right: 1%;
            }
            h1,h2{
                text-align: center;
            }
            .list-group{
                width: 75%;
                margin-left: 9%;
            }
            span{
                font-weight: 700;
            }
        </style>
</head>
<body>
    <h1 >SAV INTER MEDIA</h1>
    <h2 >IMMEUBLE BCHIR [EN FACE DE CENTRE MEDICAL RUSPINA]</h2>
    <ul class="list-group">
        <li class="list-group-item"> <span >Tel:</span> 27 400 851 / 56 172 172 </li>
        <li class="list-group-item"><span >CCB:</span> LE MONANT DE DIAGNOSTIQUE SERA ETRE FACTURER 10 DT </li>
        <li class="list-group-item"><span >TVA:</span> INTER MEDIA SE DEGAGE DE TOUTE RESONSBILITE </li>
        <li class="list-group-item"><span >RC:</span> POR MATERIELS PLUS DE TROIS MOIS</li>
    </ul>
    <div class="container" style="border-bottom: 1px dashed black">
        <table class="table table-striped">
            <thead>
                <th >FICHE TEHNIQUE</th>
            </thead>
            <tbody>
                <tr >
                    <td >Numero</td>
                    <td >Date</td>
                </tr>
                <tr >
                    <td >{{ $order->id }}</td>
                    <td >{{ now()->toDateString() }}</td>
                </tr>
            </tbody>
        </table>
        
        <table  class="table table-striped" >
            <thead>
                <th >CLIENT</th>
            </thead>
            <tbody>
                <tr >
                    <td >Code</td>
                    <td >{{ $order->client_id }}</td>
                </tr>
                <tr >
                    <td >Nom</td>
                    <td >{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
                </tr>
                <tr >
                    <td >Email</td>
                    <td >{{ $order->client->details->email }}</td>
                </tr>
                <tr >
                    <td >Adresse</td>
                    <td >{{ $order->client->details->address }}</td>
                </tr>
                <tr >
                    <td >Tel</td>
                    <td >{{ $order->client->details->phone }}</td>
                </tr>
            </tbody>
        </table>

        <table  class="table table-striped" >
            <thead>
                <th >Commande</th>
            </thead>
            <tbody>
                <tr >
                    <td >Code</td>
                    <td >{{ $order->breakdown->device->id}}</td>
                </tr>
                <tr >
                    <td >Panne</td>
                    <td >{{ $order->breakdown->title }}</td>
                </tr>
                <tr >
                    <td >Nature</td>
                    <td >{{ $order->nature }}</td>
                </tr>
                <tr >
                    <td >Payee</td>
                    <td >
                        @if($order->payment->payed) Oui @else Non @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>SAV INTER MEDIA</h1>
    <h2>IMMEUBLE BCHIR [EN FACE DE CENTRE MEDICAL RUSPINA]</h2>

           <ul class="list-group">
        <li class="list-group-item"> <span >Tel:</span> 27 400 851 / 56 172 172 </li>
        <li class="list-group-item"><span >CCB:</span> LE MONANT DE DIAGNOSTIQUE SERA ETRE FACTURER 10 DT </li>
        <li class="list-group-item"><span >TVA:</span> INTER MEDIA SE DEGAGE DE TOUTE RESONSBILITE </li>
        <li class="list-group-item"><span >RC:</span> POR MATERIELS PLUS DE TROIS MOIS</li>
    </ul>
       
    <div class="container">
    
        <table class="table table-striped" >
            <thead>
                <th >FICHE TEHNIQUE</th>
            </thead>
            <tbody>
                <tr >
                    <td >Numero</td>
                    <td >Date</td>
                </tr>
                <tr >
                    <td >{{ $order->id }}</td>
                    <td >{{ now()->toDateString() }}</td>
                </tr>
            </tbody>
        </table>
    
        <table class="table table-striped">
            <thead>
                <th >CLIENT</th>
            </thead>
            <tbody>
                <tr >
                    <td >Code</td>
                    <td >{{ $order->client_id }}</td>
                </tr>
                <tr >
                    <td >Nom</td>
                    <td >{{ $order->client->details->first_name }} {{ $order->client->details->last_name }}</td>
                </tr>
                <tr >
                    <td >Email</td>
                    <td >{{ $order->client->details->email }}</td>
                </tr>
                <tr >
                    <td >Adresse</td>
                    <td >{{ $order->client->details->address }}</td>
                </tr>
                <tr >
                    <td >Tel</td>
                    <td >{{ $order->client->details->phone }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-striped" >
            <thead>
                <th >Commnde</th>
            </thead>
            <tbody>
                <tr >
                    <td >Code</td>
                    <td >{{ $order->breakdown->device->id}}</td>
                </tr>
                <tr >
                    <td >Panne</td>
                    <td >{{ $order->breakdown->title }}</td>
                </tr>
                <tr >
                    <td >Nature</td>
                    <td >{{ $order->nature }}</td>
                </tr>
                <tr >
                    <td >Payee</td>
                    <td >
                        @if($order->payment->payed) Oui @else Non @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>