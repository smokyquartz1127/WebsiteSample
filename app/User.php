<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile', 'icon_image', 'background_image', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //リレーション
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function reserves()
    {
        return $this->hasMany('App\Reserve');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function likePosts()
    {
        return $this->belongsToMany('App\Post', 'likes');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function commentedPosts()
    {
        return $this->belongsToMany('App\Post', 'comments');
    }
}
