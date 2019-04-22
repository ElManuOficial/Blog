<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostImage;

class PostImageController extends Controller
{
    public function createPostImage(Request $request, $id){

        //guardar el archivo en el proyecto
        $file = $request->file('image');
        $path = public_path() . '/images/prueba';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);

        //registro en la base de datos
        //id debemos recibirlo por el parametro de la url
        $postImage = new PostImage();
        $postImage->url = $fileName;
        $postImage->post_images_id = $id;
        $postImage->save();








    return redirect()->back()->with('message','Foto subida con éxito');


}
}
