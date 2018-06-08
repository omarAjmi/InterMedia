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
        // dd($request->toArray());
        $order = Order::find($id);
        $order->technician_id = $request->technician;
        $order->nature = $request->nature;
        $order->return_date = $request->return_date;
        $order->verified = true;
        $order->save();

        $device = $order->breakdown->device;
        $device->brand = $request->brand;
        $device->model = $request->model;
        $device->color = $request->color;
        $device->accessories = $request->accessories;
        $device->save();

        $bd = $order->breakdown;
        $bd->title = $request->title;
        $bd->save();

        $payment = $order->payment;
        $payment->cost = $request->cost;
        $payment->deposit = $request->deposit;
        $payment->save();
        return back();        
    }

    public function verifyOrder(int $id)
    {
        $order = Order::find($id);
        $order->verified = true;
        $order->save();
        return back();
    }

    public function setAsPayed(int $id)
    {
        $payment = Order::find($id)->payment;
        $payment->payed = true;
        $payment->save();
        return back();
    }

    public function setAsClosed(int $id)
    {
        $order = Order::find($id);
        $order->closed = true;
        $order->save();
        return back();
    }

    public function invoice(int $id)
    {
        $order = Order::with(['client', 'payment', 'breakdown'])->find($id);
        return view('admin.orders.invoice')->with(['order' => $order]);
    }
}
