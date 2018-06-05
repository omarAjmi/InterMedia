<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Promotion;
use App\Technician;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $clientsCount = Client::all()->count();
        $techs = Technician::all()->take(4);
        $techsCount = $techs->count();
        $ordersCount = Order::all()->count();
        $verifiedOrdersCount = Order::where('verified', 1)->count();
        $promotions = Promotion::paginate(9);
        return view('welcome')->with([
            'clientsCount'=>$clientsCount,
            'techsCount'=>$techsCount,
            'ordersCount'=>$ordersCount,
            'verifiedOrdersCount'=>$verifiedOrdersCount,
            'promotions' => $promotions,
            'techs' => $techs
            ]);
    }
}
