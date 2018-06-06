<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nature', 'return_date', 'verified', 'client_id', 'technician_id', 'closed'
    ];

    /**
     * obtient tous les pannes du commande
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function breakdown()
    {
        return $this->hasOne('App\Breakdown');
    }

    /**
     * obtient le client du commande
     *
     * @return App\Client
     */
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'user_id');
    }

    /**
     * obtient le technicien du commande
     *
     * @return App\Technician
     */
    public function technician()
    {
        return $this->belongsTo('App\Technician', 'technician_id', 'user_id');
    }

    public function discussion()
    {
        return $this->hasOne('App\Discussion');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function history()
    {
        return $this->hasManyThrough('App\Message', 'App\Discussion');
    }
}
