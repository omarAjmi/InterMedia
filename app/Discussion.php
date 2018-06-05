<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id'
    ];

    /**
     * obtient la commande du discussion
     *
     * @return App\Order
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * obtient le technicien du discussion
     *
     * @return App\Technician
     */
    public function technician()
    {
        return $this->order->technician;
    }

    /**
     * obtient le client du discussion
     *
     * @return App\Client
     */
    public function client()
    {
        return $this->order->client;
    }

    /**
     * obtient l'historique du discussion
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function history()
    {
        return $this->hasMany('App\Message', 'discussion_id');
    }
}
