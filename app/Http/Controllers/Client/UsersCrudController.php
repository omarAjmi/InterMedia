<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Http\Requests\CreateClientPublicRequest;

class UsersCrudController extends Controller
{
    /**
     * Constructor
     */
    function __construct()
    {
        $this->middleware('admin')->only(['add', 'create']);
    }

    /**
     * apercue le profile du client
     *
     * @param integer $id
     * @return view
     */
    public function profile(int $id)
    {
        $user = User::with(['client', 'technician'])->find($id);
        return view('users.profile')->with(['user' => $user]);
    }

    /**
     * mes a jour d'utilisateur
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        if ($request->has('image')) {
            $user->image = $user->updateImage($request->file('image'));
        }
        $user->save();
        Session::flash('success', 'Mis a jour est succeé!');
        return back();
    }

    /**
     * obtient les commandes du client
     *
     * @param integer $id
     * @return void
     */
    public function orders(int $id)
    {
        $ordersList = collect();
        $orders = Client::where('user_id', $id)->first()->orders;
        foreach ($orders as $order) {
            $count = 0;
            foreach ($order->discussion->history as $msg) {
                if (!$msg->seen and $msg->sender_id !== Auth::id()) {
                    $count++;
                }
            }
            $ordersList->push(['data'=>$order, 'count'=>$count]);
        }
        // dd($ordersList);
        return view('users.orders')->with(['orders' => $ordersList]);
    }
}
