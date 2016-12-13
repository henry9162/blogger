<?php

namespace Blogger;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('Blogger\Post');
    }
}
