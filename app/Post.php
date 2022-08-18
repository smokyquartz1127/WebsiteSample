<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'text', 'image',
    ];

    //リレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function likedUsers()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    public function isLikedBy($user)
    {
        $liked_users_ids = $this->likedUsers->pluck('id');
        $result = $liked_users_ids->contains($user->id);
        return $result;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function commentedUsers()
    {
        return $this->belongsToMany('App\User', 'comments');
    }
    public function isCommentedBy($user)
    {
        $commented_users_ids = $this->commentedUsers->pluck('id');
        $result = $commented_users_ids->contains($user->id);
        return $result;
    }
}
