<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
}
