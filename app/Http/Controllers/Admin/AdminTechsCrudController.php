<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminTechsCrudController extends Controller
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

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
            'user_id' => $user->id,
            'cin' => $request->cin,
            'post' => $request->post,
            'bio' => $request->bio
        ]);
        Session::flash('success', 'Technicien ajoute');
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
        $tech = Technician::where('user_id', $id)->first();
        $tech->admin = true;
        $tech->save();
        Session::flash('success', 'Admin ajoute');
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
        $tech = Technician::where('user_id', $id)->first();
        $tech->admin = false;
        $tech->save();
        Session::flash('success', 'Admin ajoute');
        return back();
    }

    /**
     * apercue du profile du technicien
     *
     * @param integer $id
     * @return view
     */
    public function technician(int $id)
    {
        $tech = Technician::where('user_id', $id)->first();
        return view('admin.technician')->with(['technician'=>$tech]);
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
        // dd($request);
        $tech = Technician::where('user_id', $id)->first();
        $techDetails = $tech->details;
        $techDetails->first_name = $request->first_name;
        $techDetails->last_name = $request->last_name;
        $techDetails->email = $request->email;
        $techDetails->address = $request->address;
        $techDetails->phone = $request->phone;
        if ($request->has('image')) {
            $techDetails->image = $this->updateImage($request, $tech->id);
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
        $tech = Technician::where('user_id', $id)->first();
        $techDetails = $tech->details;
        $tech->delete();
        $techDetails->delete();
        Session::flash('success', 'Technicien suprime');
        return back();
    }
    /**
     * uplod du fichier image et retourner leur nom
     *
     * @param Request $request
     * @param integer $id
     * @return string
     */
    private function updateImage(Request $request, int $id) : string
    {
        $photo = $request->file('image');
        $filename = $id . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(128, 128)->save(public_path('storage/uploads/users/' . $filename));
        return $filename;
    }
}
