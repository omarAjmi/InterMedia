<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as paginator;
use Illuminate\Support\Facades\Mail;

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
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    /**
     * obtient le technicien du commande
     *
     * @return App\Technician
     */
    public function technician()
    {
        return $this->belongsTo('App\Technician', 'technician_id', 'id');
    }

    /**
     * collecter la discussion du commandes
     *
     * @return Discussion
     */
    public function discussion()
    {
        return $this->hasOne('App\Discussion');
    }

    /**
     * collecter l'payment du commandes
     *
     * @return Payment
     */
    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    /**
     * collecter l'historique du conversation du commandes
     *
     * @return Collection
     */
    public function history()
    {
        return $this->hasManyThrough('App\Message', 'App\Discussion');
    }

    /**
     * pagination des commandes
     *
     * @param integer $perPage
     * @param Collection $data
     * @return 
     */
    public static function pagination(int $perPage, Collection $data)
    {
        $currentPage = Paginator::resolveCurrentPage();
        $collection = collect($data);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return $paginatedResults;
    }

    /**
     * Notifier le client du commande par un email
     *
     * @param string $subject
     * @param string $email
     * @param Order $order
     * @return void
     */
    public static function notifyWithEmail(string $subject, string $email, Order $order)
    {
        Mail::send($email, ['order' => $order], function ($message) use ($order, $subject) {
            $message->to($order->client->details->email); #adresse du client du commande
            $message->from(env('MAIL_USERNAME')); #adresse du societe
            $message->subject($subject); #sujet d'email
        });
    }
}
