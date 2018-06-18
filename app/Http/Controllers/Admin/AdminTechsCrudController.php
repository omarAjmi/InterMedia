<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use App\Technician;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminTechsCrudController extends Controller
{

    public function technicians()
    {
        $techs = Technician::with('details', 'orders')->get();
        $paginatedTechs = Order::pagination(6, $techs); #pagination des technicien
        return view('admin.technicians')->with('techs', $paginatedTechs);
    }

    /**
     * cree un technicien
     *
     * @return void
     */
    public function create(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        if($request->has('image')) {
            $user->image = $user->uploadImage($request->file('image'));
            $user->save();
        }
        Technician::create([
            'id' => $user->id,
            'cin' => $request->cin,
            'post' => $request->post,
            'bio' => $request->bio
        ]);
        Session::flash('success', 'Technicien est creé');
        return back();
    }

    public function orders(int $id)
    {
        $tech = Technician::findOrFail($id); #retriver le technicien
        $paginatedOrders = Order::pagination(6, $tech->orders); #pagination des commande du technicien
        return view('admin.orders.all')->with(['orders' => $paginatedOrders]);
    }

    /**
     * Definir un technicien comme admin
     *
     * @param integer $id
     * @return void
     */
    public function makeAdminn(int $id)
    {
        $tech = Technician::findOrFail($id);
        $tech->admin = true;
        $tech->save();
        Session::flash('success', 'Technicien ajouté aux admins');
        return back();
    }

    /**
     * retirer un technicien du admins
     *
     * @param integer $id
     * @return void
     */
    public function unmakeAdminn(int $id)
    {
        $tech = Technician::findOrFail($id);
        $tech->admin = false;
        $tech->save();
        Session::flash('success', 'Technicien retiré du admins');
        return back();
    }

    /**
     * modifier un technicien
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $tech = Technician::find($id);
        $techDetails = $tech->details;
        $techDetails->first_name = $request->first_name;
        $techDetails->last_name = $request->last_name;
        $techDetails->email = $request->email;
        $techDetails->address = $request->address;
        $techDetails->phone = $request->phone;
        if ($request->has('image')) {
            $techDetails->image = $techDetails->uploadImage($request->file('image'));
        }
        $tech->cin = $request->cin;
        $tech->post = $request->post;
        $tech->save();
        $techDetails->save();
        Session::flash('success', 'Technicien eté mis a jour.');
        return back();
    }

    /**
     * supprimer un technicien
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        $tech = Technician::find($id);
        $techDetails = $tech->details;
        $techDetails->delete();
        Session::flash('success', 'Technicien est suprimé');
        return back();
    }
}
