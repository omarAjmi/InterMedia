@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="women_main">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
        <!-- start content -->
        <div>
            <div class=" form-mod " >
                <h3>Details:</h3>
                @if (!is_null($order))
                    <div class="pull-right">
                        <a href="{{ route('admin.invoice', ['id'=>$order->id]) }}" class="btn button-submit" style="margin-left: 1%"><i class="fa fa-print"> </i>&nbsp;Generer Fiche Technique</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('order.preview', $order->id) }}" class="btn button-submit"><i class="fa fa-comments"></i></a>
                    </div>
                    <form action="{{ route('admin.orderUpdate', ['id'=>$order->id]) }}" method="POST">                    
                        <input type="hidden" name="_method" value="PATCH">
                        <br><br>
                @else
            <form action="{{ route('admin.orderCreate') }}" method="POST" >  
                @endif
                @csrf

                <label class="col-sm-2 control-label" for="formGroupInputSmall"> client:</label>
                <div class="col-sm-10">
                <select name="client" id="class_type" class="form-control input-lg"  >
                    <option selected disabled>Assignier au client</option>
                    @foreach ($clients as $client)
                        @if (!is_null($order) and $client->id == $order->client->id)
                            <option selected value="{{ $client->id }}">{{ $client->details->first_name }} {{ $client->details->last_name }}</option>
                        @else
                            <option value="{{ $client->id }}">{{ $client->details->first_name }} {{ $client->details->last_name }}</option>
                        @endif
                    @endforeach
                </select>
                  </div>
    
                @if (!is_null($order))
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Panne:</label>
                <div class="col-sm-10">
                    <input type="text" name="title" placeholder="Panne" required="" value="{{ $order->breakdown->title }}" style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @else
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Panne:</label>
                <div class="col-sm-10">
                    <input type="text" name="title" placeholder="Panne" required=""  style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @endif

                @if (!is_null($order))
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Marque:</label>
                <div class="col-sm-10">
                    <input type="text" name="brand" placeholder="Marque" required="" value="{{ $order->breakdown->device->brand }}"  style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @else
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Marque:</label>
                <div class="col-sm-10">
                    <input type="text" name="brand" placeholder="Marque" required=""  style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @endif

                @if (!is_null($order))
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Model:</label>
                <div class="col-sm-10">
                    <input type="text" name="model" placeholder="Model" required="" value="{{ $order->breakdown->device->model }}"  style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @else
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Model:</label>
                <div class="col-sm-10">
                    <input type="text" name="model" placeholder="Model" required=""  style="width: 100%;border: 1px solid #d9d9d9;">
                </div>
                @endif
                <label class="col-sm-2 control-label" for="formGroupInputSmall"> Technicien:</label>
                <div class="col-sm-10">
                <select name="technician">
                    <option selected disabled>Assigner au technicien</option>
                    @foreach ($techs as $tech)
                        @if (!is_null($order) and $tech->id == $order->technician_id)
                            <option selected value="{{ $tech->id }}">{{ $tech->details->first_name }} {{ $tech->details->last_name }}</option>
                        @else
                            <option value="{{ $tech->id }}">{{ $tech->details->first_name }} {{ $tech->details->last_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
                <table style="width:100%;position: relative;margin-bottom: 10%">
                    <tbody >
                        <tr style="margin-bottom: 50px">
                            <td style="width: 15%;">
                                <label style="position: relatives;padding-top: 50%;padding-left: 20%">Couleur:</label>
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
                            </td>
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
                                    @if (!is_null($order) and strtolower($order->breakdown->device->color) == '#ffa500')
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
               

                    <label class="col-sm-2 control-label" for="formGroupInputSmall"> Accessoire:</label>
                <div class="col-sm-10">
                     <div class="wrap-input100 validate-input in-tag" data-validate="">
                    <input type="text" name="accessories"   data-role="tagsinput"  required="" value="{{ $order->breakdown->device->accessories }}" style="border: 0">
                    <span class="focus-input100"></span>
                </div>
               </div>
                @else
                   
                    <label class="col-sm-2 control-label" for="formGroupInputSmall"> Accesoires:</label>
                <div class="col-sm-10">
                    <div class="wrap-input100 validate-input in-tag" data-validate="">
                    <input type="text" name="accessories"   data-role="tagsinput"  required="" style="border: 0">
                    <span class="focus-input100"></span>
                </div>
                </div>   
                @endif          
                 <label class="col-sm-2 control-label" for="formGroupInputSmall"> Nature:</label>
                <div class="col-sm-10">
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
            </div>
            <label class="col-sm-2 control-label" for="formGroupInputSmall"> date:</label>
                <div class="col-sm-10">
                <div class="input-group date" id="datetimepicker">
                        @if (!is_null($order))
                            <input type='text' name="return_date" class="form-control"/>                            
                        @else
                            <input type='text' name="return_date" class="form-control"/>                            
                        @endif
                    <span class="input-group-addon" style="background-color: white;border: none" >
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
                 
                @if (!is_null($order))
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker').datetimepicker({
                            defaultDate: "{{ $order->return_date }}"
                        });
                    });
                </script>
                    <input type="submit" value="Enregistrer">
                @else
                    <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker').datetimepicker();
                    });
                </script>
                    <input type="submit" value="Creer">
                @endif
                   
        </form>
                 @if (!is_null($order))
            @if ( !$order->verified)                
                <form action="{{ route('admin.verifyOrder', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input class="btn btn-default" type="submit" value="Verifie Commande">
                </form>
            @else
                <a class="btn button-submit" style="background-color: #449d44">Commande Verifie</a>
            @endif
            @if (!$order->payment->payed)
                <form action="{{ route('admin.setOrderPayed', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input class="btn btn-default" type="submit" value="Marquer Comme payee">
                </form>
            @else
                <a  class="btn button-submit" style="background-color: #449d44">Commande Paye</a>
            @endif
            @if (!$order->closed)
                <form action="{{ route('admin.setOrderClosed', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input class="btn btn-default" type="submit" value="Marquer Comme Complete">
                </form>
            @else
                <a  class="btn button-submit" style="background-color: #449d44">Commande Complete</a>
            @endif
        @endif
               
            </div>
         
       <div class="form-mod_p" >
            <h3>Payment:(en DT)</h3>
                @if (!is_null($order))
                    <form action="{{ route('order.updatePayment', $order->payment->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                @endif

                @csrf
                 @if (!is_null($order))
                    <input type="text" name="cost" placeholder="Montant" required="" value="{{ $order->payment->cost }}" style="width: 100%">
                    <input type="text" name="deposit" placeholder="Avance" value="{{ $order->payment->deposit }}" style="width: 100%">
                @else
                    <input type="text" name="cost" placeholder="Montant" required="" style="width: 100%">
                    <input type="text" name="deposit" placeholder="Avance"style="width: 100%">
                @endif
                <input class="btn btn-default" type="submit" value="Enregistrer payment">
            </form>
        </div>
        </div>
    </div>
</div>
@endsection