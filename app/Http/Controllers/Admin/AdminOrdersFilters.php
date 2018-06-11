<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class AdminOrdersFilters extends Controller
{
    public function verified()
    {
        $orders = Order::where('verified', true)->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }

    public function closed()
    {
        $orders = Order::where('closed', true)->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }
    public function notVerified()
    {
        $orders = Order::where('verified', false)->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }

    public function notClosed()
    {
        $orders = Order::where('closed', false)->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }

    public function payed()
    {
        $orders = Order::with(['payment' => function ($query) {
            $query->where('payed', true);
        }])->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }

    public function notPayed()
    {
        $orders = Order::with(['payment' => function($query){
            $query->where('payed', false);
        }])->get()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }
}
