@extends('layouts.admin')

@section('content')
    <div class="content">
        <div>
            <a class="btn btn-primary"  href="{{ route('admin.order.filter.notVerified') }}" >
                <i class="fa fa-search"></i> Voir Non Verifiés
            </a>
            <a class="btn btn-primary"  href="{{ route('admin.order.filter.notPayed') }}" >
                <i class="fa fa-search"></i> Voir Non Payés
            </a>
            <a class="btn btn-primary"  href="{{ route('admin.order.filter.notClosed') }}" >
                <i class="fa fa-search"></i> Voir Non Complètes
            </a>
            <a class="btn btn-success pull-right"  href="{{ route('admin.orderNew') }}" >
                <i class="fa fa-plus"></i> Ajouter une commanded
            </a>
        </div>
        <div class="women_main">
            <!-- start content -->
            @if($orders->isNotEmpty())
                <ul>
                    @foreach ($orders as $order)
                        <li >
                            <div>
                                <img class="imge" src="/storage/uploads/users/{{ $order->client->details->image }}">
                                <h4 >{{ $order->breakdown->title }}</h4>
                                <h5 style="color: #7f0e0e;font-weight: bolder; ">{{ $order->created_at->toFormattedDateString() }}, {{ $order->created_at->toTimeString() }}</h5>
                                    <a href="{{ route('order.preview', $order->id) }}" class="btn button-submit"><i class="fa fa-comments"></i></a>
                                <a href="{{ route('admin.orderDetails', ['id'=>$order->id]) }}" class="btn btn-success consulter" >Consulter</a>
                                <form action="{{ route('admin.orderNew', ['id'=>$order->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input class="btn btn-danger dan" type="submit" value="Suprimer">
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h3>pas encore de commandes</h3>
            @endif
            {{ $orders->setPath(url()->current())->render() }}
        <!-- end content -->
        </div>
    </div>

@endsection
