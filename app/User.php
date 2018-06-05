<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'admin'
    ];

    /**
     * obtient le client correspondent au user | null si n'est pas un client
     *
     * @return App\Client
     */
    public function client()
    {
        return $this->hasOne('App\Client');
    }

    /**
     * obtient le technicien correspondent au user | null si n'est pas un tech
     *
     * @return App\Technician
     */
    public function technician()
    {
        return $this->hasOne('App\Technician');
    }

    /**
     * upload l'image du profile
     *
     * @param integer $id
     * @param array $photo
     * @return void
     */
    private function updateImage(array $photo)
    {
        $filename = $this->id . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(128, 128)->save(public_path('storage/uploads/users/' . $filename));
        return $filename;
    }
}
