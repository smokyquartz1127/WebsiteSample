<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'number', 'price', 'pay', 'amenity', 'note', 'image',
    ];

    //リレーション
    public function reserves()
    {
        return $this->hasMany('App\Reserve');
    }

}
