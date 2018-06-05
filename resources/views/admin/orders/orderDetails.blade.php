@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="women_main">
        <!-- start content -->
        <div>
            <div class=" form-mod ">
                <h3>Details:</h3>
                @if (!is_null($order))
                    <div class="pull-right">
                        <a href="{{ route('admin.invoice', ['id'=>$order->id]) }}" class="btn btn-success">Generer Fiche Technique</a>
                    </div>
                    <form action="{{ route('admin.orderUpdate', ['id'=>$order->id]) }}" method="POST">                    
                        <input type="hidden" name="_method" value="PATCH">
                @else
                    <form action="{{ route('admin.orderCreate') }}" method="POST">  
                @endif
                @csrf
                <select name="client" >
                    <option selected disabled>Assignier au client</option>
                    @foreach ($clients as $client)
                        @if (!is_null($order) and $client->user_id == $order->client->user_id)
                            <option selected value="{{ $client->user_id }}">{{ $client->details->first_name }} {{ $client->details->last_name }}</option>
                        @else
                            <option value="{{ $client->user_id }}">{{ $client->details->first_name }} {{ $client->details->last_name }}</option>
                        @endif
                    @endforeach
                </select>
                @if (!is_null($order))
                    <input type="text" name="title" placeholder="Panne" required="" value="{{ $order->breakdown->title }}">
                @else
                    <input type="text" name="title" placeholder="Panne" required="">
                @endif

                @if (!is_null($order))
                    <input type="text" name="brand" placeholder="Marque" required="" value="{{ $order->breakdown->device->brand }}">
                @else
                    <input type="text" name="brand" placeholder="Marque" required="">
                @endif

                @if (!is_null($order))
                    <input type="text" name="model" placeholder="Model" required="" value="{{ $order->breakdown->device->model }}">
                @else
                    <input type="text" name="model" placeholder="Model" required="">
                @endif

                <select name="technician">
                    <option selected disabled>Assigner au technicien</option>
                    @foreach ($techs as $tech)
                        @if (!is_null($order) and $tech->user_id == $order->technician_id)
                            <option selected value="{{ $tech->user_id }}">{{ $tech->details->first_name }} {{ $tech->details->last_name }}</option>
                        @else
                            <option value="{{ $tech->user_id }}">{{ $tech->details->first_name }} {{ $tech->details->last_name }}</option>
                        @endif
                    @endforeach
                </select>
                <table style="width:100%;position: relative;margin-bottom: 10%">
                    <tbody >
                        <tr style="margin-bottom: 50px">
                            <td style="width: 15%;">
                                <label style="font-family: SourceSansPro-Bold;position: relatives;padding-top: 50%">Couleur :</label>
                            </td>
                            <td>
                                <label class="container">
                                @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ededc0')
                                    <input type="radio" value="#ededc0" checked="checked" name="color">
                                @else
                                    <input type="radio" value="#ededc0" name="color">
                                @endif
                                <span class="checkmark" style=" background-color: #ededc0;
                                "></span>
                                </label>
                            </td>	
                            <td>
                                <label class="container">
                                @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#000000')
                                    <input type="radio" value="#000000" checked="checked" name="color">
                                @else
                                    <input type="radio" value="#000000" name="color">
                                @endif
                                <span class="checkmark" style=" background-color: #000000;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#0000FF')
                                        <input type="radio" value="#0000ff" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#0000ff" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #0000FF;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#a52a2a')
                                        <input type="radio" value="#a52a2a" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#a52a2a" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #A52A2A;
                                "></span>

                                </label>
                            </td>
                                <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ffd700')
                                        <input type="radio" value="#ffd700" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#ffd700" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #FFD700;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#008000')
                                        <input type="radio" value="#008000" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#008000" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #008000;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#daa520')
                                        <input type="radio" value="#daa520" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#daa520" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #DAA520;
                                "></span>
                                </label>
                            </td
                        </tr>

                        <tr>
                            <td style="width: 15%;">
                                <label style="font-family: SourceSansPro-Bold;position: relatives;">&nbsp;</label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ffc0cb')
                                        <input type="radio" value="#ffc0cb" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#ffc0cb" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #FFC0CB;
                                "></span>
                                </label>
                            </td>

                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#800080')
                                        <input type="radio" value="#800080" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#800080" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #800080;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ff0000')
                                        <input type="radio" value="#ff0000" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#ff0000" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #FF0000;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ffa500')orderAdd
                                        <input type="radio" value="#ffa500" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#ffa500" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #FFA500;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#c0c0c0')
                                        <input type="radio" value="#c0c0c0" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#c0c0c0" name="color">
                                    @endif
                                    <span class="checkmark" style=" background-color: #C0C0C0;
                                "></span>

                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ffffff')
                                        <input type="radio" value="#ffffff" checked="checked" name="color">
                                    @else
                                        <input type="radio" value="#ffffff" name="color">
                                    @endif
                                    <span class="checkmark " style=" background-color: #FFFFFF;border: 0.5px solid black;border-radius: 50%
                                "></span>

                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if (!is_null($order))
                    <input type="text" name="accessories" data-role="tagsinput" placeholder="Accessoires" required="" value="{{ $order->breakdown->device->accessories }}">
                @else
                    <input type="text" name="accessories" data-role="tagsinput" placeholder="Accessoires" required="">
                @endif                
                <select name="nature" >
                        <option selected disabled>Nature</option>
                    @foreach (['Facturable', 'Non Facturable'] as $nature)
                        @if (!is_null($order) and $order->nature == $nature)
                            <option selected value="{{ $nature }}">{{ $nature }}</option>
                        @else
                            <option value="{{ $nature }}">{{ $nature }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="input-group date" id="datetimepicker">
                    <input type='text' name="return_date" class="form-control"/>
                    <span class="input-group-addon" style="background-color: white;border: none" >
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if (!is_null($order))
                    <input type="submit" value="Enregistrer">
                @else
                    <input type="submit" value="Creer">
                @endif
                <script type="text/javascript">
                /**$(function () {
                    $("#datetimepicker").datetimepicker({
                        format: 'LT',
                        locale: 'fr'
                    });
                });
                </script>
            </div>
            <div class="form-mod_p" >
                <h3>Payment:</h3>
                @if (!is_null($order))
                    <input type="text" name="cost" placeholder="Montant" required="" value="{{ $order->payment->cost }}">
                    <input type="text" name="deposit" placeholder="Avance" required="" value="{{ $order->payment->deposit }}">
                @else
                    <input type="text" name="cost" placeholder="Montant" required="">
                    <input type="text" name="deposit" placeholder="Avance" required="">
                @endif
            </div>
        </form>
        @if (!is_null($order))
            @if ( !$order->verified)                
                <form action="{{ route('admin.verifyOrder', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input class="btn btn-default" type="submit" value="Verifie Commande">
                </form>
            @else
                <a href="#" class="btn btn-success">Commande Verifie</a>
            @endif
            @if (!$order->payment->payed)
                <form action="{{ route('admin.setOrderPayed', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input class="btn btn-default" type="submit" value="Marquer Comme payee">
                </form>
            @else
                <a href="#" class="btn btn-success">Commande Paye</a>
            @endif
        @endif
        
        </div>
    </div>
</div>
@endsection