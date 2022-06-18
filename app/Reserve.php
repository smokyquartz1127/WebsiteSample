<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reserve extends Model
{
    protected $fillable = [
        'user_id', 'room_id', 'number', 'start', 'end',
    ];

    //リレーション
    protected function user()
    {
        return $this->belongsTo('App\User');
    }
    protected function room()
    {
        return $this->belongsTo('App\Room');
    }
}
