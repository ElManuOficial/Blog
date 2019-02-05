<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Auth;
use App\Post;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    //

    public function index(){

        //$posts= Post::all();
        $posts= Post::paginate(10);
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
        $post= Post::find($id);
        $likes= Like::where('post_id',$id)->get();//esto retorna los likes que tiene este post

        if ($likes->count()>0){

            $id_user = $likes->where('user_id',Auth::id())->first()->user_id;//usuario especifico que le dio like

        }else{
            $id_user = 0;
        }


        return view('showPost', compact('post','likes','id_user'));


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
