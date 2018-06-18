<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'category'
    ];

    /**
     * upload l'image du promotion
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    public function uploadImage(int $id, UploadedFile $photo)
    {
        $filename = $this->id . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(950, 950)->save(public_path('storage/uploads/promotions/' . $filename));
        return $filename;
    }
}
