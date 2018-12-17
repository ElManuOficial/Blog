<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    //

    public function index(){

        $posts= Post::all();
        return view('post',[
            "posts"=> $posts,
        ]);
    }

    //createPost
    public function createPost(PostRequest $request){

            Post::create([

            "title" => $request->input('title'),
            "content" => $request->input('content'),
            "user_id" => Auth::id(),
            "updated_id" => Auth::id(),

        ]);



        //redireccionar
        //return $request->all();
        return redirect()->back()->with('message','Su post ha sido guardado Exitosamente');


    }
    public function showPost($id){
    //recibe por parametro el id del post a buscar
        $post=Post::find($id);
        return view('showPost',["post"=>$post]);




    }

    public function editPost($id){
        //editar
        $post=Post::find($id);
        //editarlo

        //redireccionar
        return view('editPost',compact('post'));
        //return view('editPost')->with('message','Su post ha sido editado Exitosamente');



    }

    public function updatePost(PostRequest $request, $id){

        //ubicarlo
        $post=Post::find($id);
        //editarlo
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->updated_id = Auth::id();
        $post->save();

        //redireccionar
        return redirect()->back()->with('message','Su post ha sido modificado Exitosamente');



    }

    public function deletePost($id){
        //ubicarlo
        Post::destroy($id);
        //eliminarlo
        //redireccionar
        return redirect('/post')->with('message','Su post ha sido ELIMINADO Exitosamente');
        /*redirect()->back()->with('message','Su post ha sido ELIMINADO Exitosamente');*/

    }


}
