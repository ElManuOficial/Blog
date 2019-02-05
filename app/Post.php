<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;

class Post extends Model
{
    //
    protected $guarded=[];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function likes(){

        return $this->hasMany(Like::class);

    }

}
