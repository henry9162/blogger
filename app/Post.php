<?php

namespace Blogger;

use LRedis;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    /*public function __construct()
    {
        return $this->storage = LRedis::Connection();
    }
*/
    public function category()
    {
    	return $this->belongsTo('Blogger\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('Blogger\Tag');
    }


    public function comments()
    {
    	return $this->hasMany('Blogger\Comment', 'post_id');
    }

    public function likes()
    {
        return $this->morphMany('Blogger\Like', 'likeable');
    }
}
