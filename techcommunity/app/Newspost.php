<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newspost extends Model
{
     public function comments()
    {
        return $this->hasMany('Comment');
    }

}
