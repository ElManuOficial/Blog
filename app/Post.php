<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;
use App\PostImage;
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

    public function images(){

        return $this->hasMany(PostImage::class);
    }

}
