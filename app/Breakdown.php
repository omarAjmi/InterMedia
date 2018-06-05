<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'device_id', 'order_id'
    ];

    /**
     * obtient la commande du panne
     *
     * @return App\Order
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    /**
     * obtient la machine du panne
     *
     * @return App\Device
     */
    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id');
    }
}
