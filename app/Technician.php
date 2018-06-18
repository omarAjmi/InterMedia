<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cin', 'bio', 'id', 'post', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'admin'
    ];
    /**
     * obtient les pannes du technicien
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'technician_id', 'id');
    }

    /**
     * obtient les information user du technicien
     *
     * @return App\User
     */
    public function details()
    {
        return $this->belongsTo('App\User', 'id', 'id');
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
