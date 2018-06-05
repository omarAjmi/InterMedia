<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'color', 'accessories'
    ];

    /**
     * obtient tous les pannes du machine
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function breakdowns()
    {
        return $this->hasMany('App\Breakdown', 'device_id');
    }
}
