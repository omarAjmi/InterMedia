@extends('layouts.public')
@section('content')
<h3 class="title clr">Mes<span class="sub-text"> Commandes</span></h3>
@if($orders->isEmpty())
    <h2>Aucune commande pour le moment</h2>
@else
    <div class="top_tabs_agile">
        <div id="verticalTab" class="top_tabs_agile">
            <ul class="resp-tabs-list">
                @foreach ($orders as $key => $order)
                    <li class="resp-tab-item resp-tab-active">
                        <span class="fa fa-desktop" aria-hidden="true"></span>commande {{ $x = $key+1 }}:
                    </li>
                @endforeach
            </ul>
            @foreach ($orders as $key => $order)
                <div class="resp-tabs-container">
                    <div class="tab{{ $key+1 }}">
                        <div class="services-right-agileits">
                            <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                                <img src="/storage/uploads/users/{{ $order->client->details->image }}" alt="" class="img-r">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                                <h4>Commande {{ $key+1 }}:</h4>
                                <p>  Date : {{ $order->created_at }}<br>
                                    Panne: {{ $order->breakdown->title }}<br>
                                    Marque: {{ $order->breakdown->device->brand }}<br>
                                    Model: {{ $order->breakdown->device->model }}<br>
                                    Couleur: {{ $order->breakdown->device->color }} <br>
                                    Accessoires : {{ $order->breakdown->device->accessories }}<br>
                                </p>
                                <a href="{{ route('order.preview', $order->id) }}" id="addClass"><button class="btn btn-primary" style="border-radius: 25px;border-color: transparent;"><span class="fa fa-comments"></span> Voir discussion</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clearfix"> </div>
    </div>
@endif
<!--//messages-->

<!--fin messages-->
<script>
    $('.toggle').click(function () {
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms  
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
    $(function(){
        $("#addClass").click(function () {
            $('#qnimate').addClass('popup-box-on');
            });

        $("#removeClass").click(function () {
            $('#qnimate').removeClass('popup-box-on');
            });
    });
</script>
<!-- //contact-->
@stop()