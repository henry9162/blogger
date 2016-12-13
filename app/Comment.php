<?php

namespace Blogger;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $table = 'comments';

    public function post()
    {
    	return $this->belongsTo('Blogger\Post');
    }

    public function replies()
    {
    	return $this->hasMany('Blogger\Reply');
    }

    public function likes()
    {
    	return $this->morphMany('Blogger\Like', 'likeable');
    }
}
