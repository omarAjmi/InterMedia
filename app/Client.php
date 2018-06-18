<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id'
    ];

    /**
     * obtient tous les détails du client
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function details()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }

    /**
     * obtient tous les commandes du client
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'client_id', 'id');
    }

    /**
     * obtient tous les pannes du client
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function breakdowns()
    {
        return $this->hasManyThrough('App\Breakdown', 'App\Order', 'client_id', 'order_id', 'id', 'id');
    }

    /**
     * obtient tous les paiements du client
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function payments()
    {
        return $this->hasManyThrough('App\Payment', 'App\Order', 'client_id', 'order_id', 'id', 'id');
    }

    /**
     * obtient tous les techniciens qui ont interragi avec le client
     *
     * @return void
     */
    public function technicians()
    {
        return $this->hasManythrough('App\Technician', 'App\Order', 'client_id', 'id', 'id', 'technician_id');
    }

    public static function pagination(int $perPage, Collection $data)
    {
        $currentPage = Paginator::resolveCurrentPage();
        $collection = collect($data);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return $paginatedResults;
    }
    
}
