<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discussion_id', 'seen', 'sender_id', 'context'
    ];

    /**
     * obtient la discussion du message
     *
     * @return App\Discussion
     */
    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }

    /**
     * obtient l'expediteur du message
     *
     * @return App\User
     */
    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id', 'id');
    }
}
