<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class UsersCrudController extends Controller
{
    /**
     * apercue le profile du client
     *
     * @param integer $id
     * @return view
     */
    public function profile(int $id)
    {
        $user = User::with(['client', 'technician'])->findOrFail($id);
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
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        if ($request->has('image')) {
            $user->image = $user->UploadImage($request->file('image'));
        }
        $user->save();
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
        $orders = Client::find($id)->orders;
        foreach ($orders as $order) {
            $count = 0;
            foreach ($order->discussion->history as $msg) {
                if (!$msg->seen and $msg->sender_id !== Auth::id()) {
                    $count++;
                }
            }
            $ordersList->push(['data'=>$order, 'count'=>$count]);
        }
        return view('users.orders')->with(['orders' => $ordersList]);
    }

    public function confirmInscription(Request $request)
    {
        $user = Auth::user();
        if($request->confirm_hash == $user->confirm_hash)
        {
            $user->confirmed = 1;
            $user->save();
            return redirect('/');
        } else {

        }
    }

    public function resendConfirm()
    {
        $user = Auth::user();
        try {
            Mail::send('emails.confirmEmail', ['user'=>$user], function ($message) use ($user) {
                $message->to($user->email);
                $message->from(env('MAIL_USERNAME'));
                $message->subject('Confirmation Adresse Email');
            });
        } catch (Exception $e) {
            
        }
        return back();
    }
}
