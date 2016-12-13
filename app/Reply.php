<?php

namespace Blogger;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function comment()
    {
    	return $this->belongsTo('Blogger\Comment');
    }

    public function likes()
    {
    	return $this->morphMany('Blogger\Like', 'likeable');
    }
}
