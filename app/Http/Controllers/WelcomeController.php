<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Promotion;
use App\Technician;
use Illuminate\Support\Facades\Auth;

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
        $orders = null;
        $msgsCount = 0;
        if (Auth::check()) {
            if (!is_null(Auth::user()->client)) {
                $orders = Client::where('user_id', Auth::id())->first()->orders;
            } else {
                $orders = Technician::where('user_id', Auth::id())->first()->orders;
            }
            foreach ($orders as $order) {
                foreach ($order->discussion->history as $msg) {
                    if (!$msg->seen and $msg->sender_id !== Auth::id()) {
                        $msgsCount++;
                    }
                }
            }
        }
        return view('welcome')->with([
            'clientsCount'=>$clientsCount,
            'techsCount'=>$techsCount,
            'ordersCount'=>$ordersCount,
            'verifiedOrdersCount'=>$verifiedOrdersCount,
            'promotions' => $promotions,
            'techs' => $techs,
            'msgsCount' => $msgsCount
            ]);
    }
}
