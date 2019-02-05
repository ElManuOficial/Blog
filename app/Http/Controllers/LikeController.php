<?php

namespace App\Http\Controllers;


use App\Like;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    public function createlike( $post_id){

        Like::create([

        "post_id" => $post_id,
        "user_id" => Auth::id(),

    ]);
    return redirect()->back();


}

    public function destroylike($post_id){

        //ubicar usuario que tiene el like Auth::id()
        //ubicar el post que tiene el like $post_id

        $like= Like::where('post_id',$post_id)->where('user_id',Auth::id())->pluck('id')->first(); //id del post a eliminar
        Like::destroy($like);

        return redirect()->back();

    }




}
