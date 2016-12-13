<?php

namespace Blogger;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likeable';

    public function likeable()
    {
    	return $this->morphTo();
    }


    public function comment()
    {
    	return $this->belongsTo('Blogger\Comment', 'comment_id');
    }

    public function post()
    {
    	return $this->belongsTo('Blogger\Post', 'post_id');
    }
}
