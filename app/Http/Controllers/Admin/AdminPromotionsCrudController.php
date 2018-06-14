<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminPromotionsCrudController extends Controller
{

    /**
     * Afficher tous les promotions
     *
     * @return View
     */
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
        try {
            $promotion = Promotion::create([
                'title' => $request->title,
                'category' => $request->category,
            ]);
            $promotion->image = $promotion->uploadImage($promotion->id, $request->file('image'));
            $promotion->save();
            Session::flash('success', "promotion est creé");
            return back();
        } catch (\Exception $e) {
            Session::flash('fail', "promotion n'est pas creé");
            return back();
        }
    }

    /**
     * modifier une  promotion
     *
     * @return view
     */
    public function update(Request $request, int $id)
    {     
        try {
            $promotion = Promotion::findOrFail($id);
            $promotion->title = $request->title;
            $promotion->category = $request->category;
            if ($request->has('image')) {
                $promotion->image = $promotion->uploadImage($id, $request->file('image'));
            }
            $promotion->save();
            Session::flash('success', "promotion est mis à jour");
            return back();
        } catch (\Exception $e) {
            Session::flash('fail', "promotion n'est pas mis à jour");
            return back();
        }
    }

    /**
     * supprimer une  promotion
     *
     * @return view
     */
    public function delete(int $id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            $promotion->delete();
            Session::flash('success', "promotion est suprimé");
            return back();
        } catch (\Exception $e) {
            Session::flash('fail', "promotion n'est pas suprimé");
            return back();
        }
    }
}
