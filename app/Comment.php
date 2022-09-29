<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'id');
    }

}
