<?php

namespace App;

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
}
