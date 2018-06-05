@extends('layouts.admin')
@section('content')
    <div class="table_content" >
        <div class="table_div" style="">
            <img src="images/clients-pic.jpg" style="">
            <a href="{{ route('admin.clients') }}" class="btn btn-info">Clients</a>
        </div>
        <div class="table_div">
            <img src="images/repair.png" >
            <a href="{{ route('admin.technicians') }}" class="btn btn-info">Techniciens</a>
        </div>
        <div class="table_div">
            <img src="images/commande.jpg">
            <a href="{{ route('admin.orders') }}" class="btn btn-info">Commandes</a>
        </div>
        <div class="table_div">
            <img src="images/promo.jpg" >
            <a href="{{ route('admin.promotions') }}" class="btn btn-info">Promotions</a>
        </div>
    </div>
@stop