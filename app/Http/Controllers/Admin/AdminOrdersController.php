<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Client;
use App\Device;
use App\Payment;
use App\Breakdown;
use App\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateOrderRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Discussion;
use Illuminate\Support\Facades\Log;

class AdminOrdersController extends Controller
{
    /**
     * retriver tous les commandes ordonnes par date et paginees
     *
     * @return Collection
     */
    public function browse()
    {
        $orders = Order::all()->sortByDesc('created_at'); #retriver les commandes
        $paginatedOrders = Order::pagination(6, $orders);
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * afficher formulaire creer une nouvelle commande
     *
     * @return View
     */
    public function new()
    {
        $clients = Client::with('details')->get(); #retriver les clients pour populer la liste des clients
        $techs = Technician::with('details')->get(); #retriver les techs pour populer la liste des techniciens
        return view('admin.orders.orderDetails')->with(['order' => null, 'clients' => $clients, 'techs'=>$techs]);
    }

    /**
     * Prevue une commande
     *
     * @param integer $id
     * @return View
     */
    public function preview(int $id)
    {
        $clients = Client::with('details')->get(); #retriver les clients pour populer la liste des clients
        $techs = Technician::with('details')->get(); #retriver les techs pour populer la liste des techniciens
        $order = Order::with(['breakdown', 'client', 'technician', 'payment'])->findOrFail($id); #retriver la commande
        return view('admin.orders.orderDetails')->with(['order' => $order, 'clients' => $clients, 'techs' => $techs]);
    }

    /**
     * Ajouter une nouvelle commande a la base des donnees
     *
     * @param Request $request
     * @return Route
     */
    public function create(Request $request)
    {
        $order = Order::create([ #creer une commande
            'client_id' => $request->client,
            'technician_id' => $request->technician,
            'nature' => $request->nature,
            'return_date' => \Carbon\Carbon::parse($request->return_date),
            'verified' => true
        ]);

        $device = Device::create([ #creer une machine
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'accessories' => $request->accessories
        ]);

        $bd = Breakdown::create([ #creer un panne
            'title' => $request->title,
            'order_id' => $order->id,
            'device_id' => $device->id
        ]);

        Payment::create([ #creer une payment
            'order_id' => $order->id,
            'cost' => $request->cost,
            'deposit' => $request->deposit
        ]);

        Discussion::create(['order_id' => $order->id]); #creer une discussoin
        try {
            Order::notifyWithEmail('Commande a été creé', 'emails.OrderCreatedEmail', $order);
            Session::flash('success', 'Commade est creé');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est creé mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return redirect(route('admin.orderDetails', $order->id));
    }

    /**
     * Mis a jours d'une commande
     *
     * @param integer $id
     * @param Request $request
     * @return Route
     */
    public function updatePayment(int $id, Request $request)
    {
        $payment = Payment::findOrFail($id); #retriver le payment d'une commade
        $payment->cost = $request->cost; #mis a jour montant
        $payment->deposit = $request->deposit; #mis a jour avance
        $payment->save(); #enregistre #enregistre
        try {
            Order::notifyWithEmail('Commande a été mis à jour', 'emails.OrderUpdatedEmail', $payment->order);
            Session::flash('success', 'Commade est mis à jour');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est mis à jour mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return back(); #revien au lien precedent #revien au lien precedent
    }
    public function update(int $id, Request $request)
    {
        $order = Order::with(['breakdown.device', 'payment'])->findOrFail($id); #retriver la commande
        $order->technician_id = $request->technician; #mis a jour id du technicien
        $order->nature = $request->nature; #mis a jour nature
        $order->return_date = \Carbon\Carbon::parse($request->return_date); #convertir chaine du date et ajouter au date_return
        $order->verified = true; #marquer commande verifier car elle ete creer par l'admin
        $order->save(); #enregistre

        $device = $order->breakdown->device; #retriver la machine du commande
        $device->brand = $request->brand; #mis a jour la marque machine
        $device->model = $request->model; #mis a jour le model machine
        $device->color = $request->color; #mis a jour la couleur machine
        $device->accessories = $request->accessories; #mis a jour les accesoirs machine
        $device->save(); #enregistre

        $bd = $order->breakdown; #retriver le panne du commande
        $bd->title = $request->title; #mis a jour le titre du panne
        $bd->save(); #enregistre
        try {
            Order::notifyWithEmail('Commande a été mis à jour', 'emails.OrderUpdatedEmail', $order);
            Session::flash('success', 'Commade est mis à jour');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est mis à jour mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return back(); #revien au lien precedent        
    }

    /**
     * Marquer une commande comme verifie
     *
     * @param integer $id
     * @return Route
     */
    public function verifyOrder(int $id)
    {
        $order = Order::findOrFail($id); #retriver la commade
        $order->verified = true; #marquer comme verifié
        $order->save(); #enregistre
        try {
            Order::notifyWithEmail('Commande a été verifié', 'emails.OrderVerifiedEmail', $order);
            Session::flash('success', 'Commade est verifié');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est verifié mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return back(); #revien au lien precedent
    }

    /**
     * Marquer une commande comme payee
     *
     * @param integer $id
     * @return Route
     */
    public function setAsPayed(int $id)
    {
        $order = Order::findOrFail($id); #retriver la commade
        $payment = $order->payment; #retriver lae payment du commade
        $payment->payed = true; #marquer comme payé
        $payment->save(); #enregistre
        try {
            Order::notifyWithEmail('Commande est payé', 'emails.OrderPayedEmail', $order);
            Session::flash('success', 'Commade est payé');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est payé mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return back(); #revien au lien precedent
    }

    /**
     * Marquer une commande comme complete
     *
     * @param integer $id
     * @return Route
     */
    public function setAsClosed(int $id)
    {       
        $order = Order::findOrFail($id); #retriver la commade
        $order->closed = true; #marquer comme terminé
        $order->save(); #enregistre
        try {
            Order::notifyWithEmail('Commande est terminé', 'emails.OrderClosedEmail', $order);
            Session::flash('success', 'Commade est terminé');
        } catch (\Exception $e) {
            Session::flash('fail', "Ooops! Commade est terminé mais email n' été pas envoyé, verifier votre connection.");
            return back(); #revien au lien precedent
        }
        return back(); #revien au lien precedent
    }

    /**
     * Generer fiche technique d'une commande
     *
     * @param integer $id
     * @return View
     */
    public function invoice(int $id)
    {
        $order = Order::with(['client', 'payment', 'breakdown'])->findOrFail($id); #retriver la commande
        return view('admin.orders.invoice')->with(['order' => $order]);
    }

    public function delete(int $id)
    {
        $order = Order::findOrFail($id);
        Order::notifyWithEmail('Commande est irréparable ', 'emails.OrderUnreparableEmail', $order);
        $order->delete();
        Session::flash('success', 'Commande est suprimé');
        return back();
    }
}
