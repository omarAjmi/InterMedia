<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminPromotionsCrudController extends Controller
{

    public function browse()
    {
        $promotions = Promotion::paginate(5);
        return view('admin.promotions')->with(['promotions'=>$promotions]);
    }

    /**
     * ajouter une promotion
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $promotion = Promotion::create([
            'title' => $request->title,
            'category' => $request->category,
        ]);
        $promotion->image = $this->uploadImage($promotion->id, $request);
        $promotion->save();
        Session::flash('success', 'promotion est cree');
        return redirect(route('admin.promotions', ['id' => $promotion->id]));
    }

    /**
     * modifier une  promotion
     *
     * @return view
     */
    public function update(Request $request, int $id)
    {     
        $promotion = Promotion::find($id);
        $promotion->title = $request->title;
        $promotion->category = $request->category;
        if($request->has('image')) {
            $promotion->image = $this->uploadImage($id, $request);
        }
        $promotion->save();
        Session::flash('success', 'promotion est edite');
        return back();
    }

    /**
     * supprimer une  promotion
     *
     * @return view
     */
    public function delete(int $id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        Session::flash('success', 'promotion est suprime');
        return redirect('/admin');
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
        Image::make($photo)->resize(950, 950)->save(public_path('storage/uploads/promotions/' . $filename));
        return $filename;
    }
}
