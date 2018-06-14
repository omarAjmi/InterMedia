<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Session;

class AdminClientsController extends Controller
{
    /**
     * Afficher tous les clients
     *
     * @return View
     */
    public function browse()
    {
        $clients = Client::with(['orders', 'details'])->get(); #retriver tous les clients
        $paginatedClients = Client::pagination(6, $clients); #pagination des client
        return view('admin.clients')->with('clients', $paginatedClients);
    }

    /**
     * Creer un client
     *
     * @param Request $request
     * @return view
     */
    public function create(Request $request)
    {
        $user = User::create([ #creer un utilisateur
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make('12345678'),
        ]);
        Client::create([ #creer un client a partir d'utilisateur
            'id' => $user->id
        ]);
        try {
            Mail::send('emails.welcomeEmail', [], function ($message) use ($user) {
                $message->to($user->email);
                $message->from(env('MAIL_USERNAME'));
                $message->subject('Bienvenue');
            });
            Session::flash('success', 'Client est creé');
            return back();
        } catch (\Exception $e) {
            Session::flash('fail', "Clent est creé mais email n' été pas envoyé, verifier votre connection .");
            return back();
        }
    }

    public function orders(int $id)
    {
        $client = Client::findOrFail($id); #retriver le client
        $paginatedOrders = Order::pagination(6, $client->orders); #pagination des commande du client
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Creer un client
     *
     * @param Request $request
     * @return view
     */
    public function update(int $id, Request $request)
    {
        $client = Client::findOrFail($id); #retriver le client
        $clientdetails = $client->details;
        $clientdetails->first_name = $request->first_name;
        $clientdetails->last_name = $request->last_name;
        $clientdetails->email = $request->email;
        $clientdetails->address = $request->address;
        $clientdetails->phone = $request->phone;
        if ($request->has('image')) {
            $clientdetails->image = $clientdetails->uploadImage($client->id, $request);
        }
        $clientdetails->save();
        Session::flash('success', "Client est mis à jour.");
        return back();
    }
    
    /**
     * suprimer un client
     *
     * @param integer $id
     * @return view
     */
    public function delete(int $id)
    {
        User::destroy($id); #suprimer l'utilisateur
        Session::flash('success', "Client est suprimé.");
        return redirect(route('admin.clients'));
    }
}
