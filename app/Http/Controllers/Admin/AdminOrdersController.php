<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Client;
use App\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateOrderRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Device;
use App\Breakdown;

class AdminOrdersController extends Controller
{
    public function browse()
    {
        $orders = Order::all()->sortByDesc('created_at');
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $collection = collect($orders);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return view('admin.orders.all')->with(['orders' => $paginatedResults]);
    }

    public function new()
    {
        $clients = Client::with('details')->get();
        $techs = Technician::with('details')->get();
        return view('admin.orders.orderDetails')->with(['order' => null, 'clients' => $clients, 'techs'=>$techs]);
    }

    public function preview(int $id)
    {
        $clients = Client::with('details')->get();
        $techs = Technician::with('details')->get();
        $order = Order::with(['breakdown', 'client', 'technician', 'payment'])->find($id);
        return view('admin.orders.orderDetails')->with(['order' => $order, 'clients' => $clients, 'techs' => $techs]);
    }

    public function create(Request $request)
    {
        dd(['CREATE', $request]);
        $order = Order::create([
            'client' => $request->client,
            'technician' => $request->technician,
            'nature' => $request->nature,
            'return_date' => $request->return_date,
            'varified' => true
        ]);

        $device = Device::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'accessories' => $request->accessories
        ]);

        $bd = Breakdown::create([
            'title' => $request->title,
            'order_id' => $order->id,
            'device_id' => $device->id
        ]);

        Payment::create([
            'order_id' => $order->id,
            'cost' => $request->cost,
            'deposit' => $request->deposit
        ]);

        Discussion::create(['order_id' => $order->id]);
    }

    public function update(int $id, Request $request)
    {
        dd(['UPDATE', $request]);
    }

    public function verifyOrder(int $id)
    {
        $order = Order::find($id);
        $order->verified = true;
        $order->save();
        Session::flash('success', 'Commande Verifie');
        return back();
    }

    public function setAsPayed(int $id)
    {
        $payment = Order::find($id)->payment;
        $payment->payed = true;
        $payment->save();
        Session::flash('success', 'Commande est paye');
        return back();
    }

    public function invoice(int $id)
    {
        $order = Order::with(['client', 'payment', 'breakdown'])->find($id);
        return view('admin.orders.invoice')->with(['order' => $order]);
    }
}
