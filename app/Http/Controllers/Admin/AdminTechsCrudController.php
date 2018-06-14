<?php

namespace App\Http\Controllers\Admin;

use App\User;
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
        return view('admin.technicians')->with('techs', $techs);
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
            $user->image = $this->updateImage($request, $user->id);
            $user->save();
        }
        Technician::create([
            'id' => $user->id,
            'cin' => $request->cin,
            'post' => $request->post,
            'bio' => $request->bio
        ]);
        return redirect(route('user.profile', ['id' => $user->id]));
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
            $techDetails->image = $techDetails->updateImage($request, $tech->id);
        }
        $tech->cin = $request->cin;
        $tech->post = $request->post;
        $tech->save();
        $techDetails->save();
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
        return back();
    }
}
