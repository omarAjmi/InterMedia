<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class AdminOrdersFilters extends Controller
{
    /**
     * Afficher tous les commandes verifies
     *
     * @return View
     */
    public function verified()
    {
        $orders = Order::where('verified', true)->get()->sortByDesc('created_at');
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Afficher tous les commandes completes
     *
     * @return View
     */
    public function closed()
    {
        $orders = Order::where('closed', true)->get()->sortByDesc('created_at');
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Afficher tous les commandes non verifie
     *
     * @return View
     */
    public function notVerified()
    {
        $orders = Order::where('verified', false)->get()->sortByDesc('created_at');
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Afficher tous les commandes non completes
     *
     * @return View
     */
    public function notClosed()
    {
        $orders = Order::where('closed', false)->get()->sortByDesc('created_at');
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Afficher tous les commandes payees
     *
     * @return View
     */
    public function payed()
    {
        $orders = Order::with(['payment' => function ($query) {
            $query->where('payed', true);
        }])->get()->sortByDesc('created_at');
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Afficher tous les commandes non payees
     *
     * @return View
     */
    public function notPayed()
    {
        $orders = Order::with(['payment' => function($query){
            $query->where('payed', false);
        }])->get()->sortByDesc('created_at');
        foreach ($orders as $key => $order) {
            if (is_null($order->payment)) {
                $orders->forget($key);
            }
        }
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }
}
