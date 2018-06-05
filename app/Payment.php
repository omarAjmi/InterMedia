<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cost', 'deposit', 'payed', 'order_id'
    ];

    /**
     * obtient la commande du paiment
     *
     * @return App\Order
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
}
