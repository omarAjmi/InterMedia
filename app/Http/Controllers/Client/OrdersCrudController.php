<?php

namespace App\Http\Controllers\Client;

use App\Order;
use App\Device;
use App\Payment;
use App\Breakdown;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateOrderPublicRequest;

class OrdersCrudController extends Controller
{
    /**
     * Constructor
     */
    function __construct()
    {
        // $this->middleware('authacctoorder')->only(['preview']);
    }
    /**
     * prevue du commande
     *
     * @return view
     */
    public function preview(int $id)
    {
        $order = Order::with(['breakdown.device','discussion.history'])->find($id);
        foreach ($order->discussion->history as $msg) {
            if($msg->sender_id !== Auth::id() and !$msg->seen) {
                $msg->seen = true;
                $msg->save();
            }
        }
        return view('orders.preview')->with(['order' => $order]);
    }

    /**
     * formulaire pour ajouter une  commande
     *
     * @return view
     */
    public function new()
    {
        return view('orders.new');
    }

    /**
     * ajouter une commande
     *
     * @param Request $request
     * @return void
     */
    public function create(CreateOrderPublicRequest $request)
    {   
        $order = Order::create([
            'client_id' => Auth::id(),
        ]);
        $device = Device::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'accessories' => $request->accessories
        ]);
        $bd = Breakdown::create([
            'order_id' => $order->id,
            'device_id' => $device->id,
            'title' => $request->breakdown
        ]);
        Payment::create([
            'order_id' => $order->id
        ]);
        Discussion::create(['order_id'=>$order->id]);
        
        Mail::send('emails.OrderCreatedEmail', ['title'=>$bd->title], function ($message) use ($order) {
            $message->to($order->client->details->email);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('Commande Creé');
        });
        return redirect(route('user.orders',['id'=>Auth::id()]));
    }

    /**
     * formulaire pour modifier une  commande
     *
     * @return view
     */
    public function edit(int $id)
    {
        $order = Order::find($id);
        return view('orders.preview')->with(['order' => $order]);
    }

    /**
     * modifier une  commande
     *
     * @return view
     */
    public function update(Request $request, int $id)
    {
        $breakdown = Breakdown::find($id);
        $breakdown->title = $request->title;
        Session::flash('success', 'ordre est edite');
        return back();
    }

    /**
     * supprimer une  commande
     *
     * @return view
     */
    public function delete(int $id)
    {
        $order = Order::find($id);
        foreach ($order->breakdowns as $breakdown) {
            $breakdown->delete();
        }
        $payment = $order->payment;
        $payment->delete();
        $order->delete();
        Session::flash('success', 'ordre est suprime');
        return redirect('/');
    }

    public function send()
    {
        Mail::send('email.test', [], function($message){
            $message->to('devanewage@outlook.com');
            $message->subject('djsd,sdj,n');
        });
    }
}