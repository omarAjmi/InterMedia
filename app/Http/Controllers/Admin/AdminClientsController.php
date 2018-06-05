<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class AdminClientsController extends Controller
{

    public function browse()
    {
        $clients = Client::with(['orders', 'details'])->get();
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 6;
        $clients = $clients->sortBy('details.first_name');
        // dd($clients->sortBy('details.last_name'));
        $currentPageResults = $clients->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($clients), $perPage);
        return view('admin.clients')->with('clients', $paginatedResults);
    }

    /**
     * Creer un client
     *
     * @param Request $request
     * @return view
     */
    public function create(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make('12345678'),
        ]);
        Client::create([
            'user_id' => $user->id
        ]);
        return back();
    }

    public function orders(int $id)
    {
        $client = Client::where('user_id', $id)->first();
        $orders = $client->orders;
        return view('admin.orders.all')->with(['orders' => $orders]);
    }

    /**
     * Creer un client
     *
     * @param Request $request
     * @return view
     */
    public function update(int $id, Request $request)
    {
        $client = Client::where('user_id', $id)->first();
        $clientdetails = $client->details;
        $clientdetails->first_name = $request->first_name;
        $clientdetails->last_name = $request->last_name;
        $clientdetails->email = $request->email;
        $clientdetails->address = $request->address;
        $clientdetails->phone = $request->phone;
        if ($request->has('image')) {
            $clientdetails->image = $this->uploadImage($client->user_id, $request);
        }
        $clientdetails->save();
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
        User::destroy($id);
        return redirect(route('admin.clients'));
    }

    /**
     * upload l'image du profile
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    private function uploadImage(int $id, Request $request)
    {
        $photo = $request->file('image');
        $filename = $id . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(128, 128)->save(public_path('storage/uploads/users/' . $filename));
        return $filename;
    }
}
