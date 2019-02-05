<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
href solo tiene metodo http GET
por que el update lo pase por POST? porque el formulario si tiene el metodo POST
crear por POST
editar por POST
eliminar por POST todos los que escriben en la BD son por POST
los que leen son por GET, como listar, consultar.
la forma correcta de hacer el delete es por metodo post
*/
Route::get('/post', 'PostController@index');
Route::post('/post', 'PostController@createPost');
Route::get('/post/{id}','PostController@showPost');
Route::get('/post-edit/{id}','PostController@editPost');
Route::post('/post-update/{id}','PostController@updatePost');
Route::post('/post-delete/{id}','PostController@deletePost');
/*likes*/
Route::post('/post-like/{id}','LikeController@createlike');//dar like
Route::post('/post-dis-like/{id}','LikeController@destroylike');//dar like

