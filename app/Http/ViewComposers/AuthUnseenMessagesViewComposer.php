<?php

namespace App\Http\ViewComposers;

use App\Client;
use App\Technician;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;


class AuthUnseenMessagesViewComposer
{
    public function compose(View $view)
    {
        $orders = null;
        $msgsCount = null;
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
        return $view->with(['msgsCount' => $msgsCount]);
        
    }
}
