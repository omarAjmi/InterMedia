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
        'cin', 'bio', 'user_id', 'post', 'admin'
    ];

    /**
     * obtient les pannes du technicien
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'technician_id', 'user_id');
    }

    /**
     * obtient les information user du technicien
     *
     * @return App\User
     */
    public function details()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
