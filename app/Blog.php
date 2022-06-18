<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'admin_id', 'title', 'first_paragraph', 'second_paragraph', 'third_paragraph', 'image',
    ];

    //リレーション
    protected function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
