@extends('layouts.app')



@section('content')



        <div class="row justify-content-center container-flex">
                <div class="" style="background-color:rgba(13, 11, 11, 0.35); padding:30px 100px; border-radius:8px"> <!--PARA COLOCAR UN OVERLAY-->
                    <div class="col-auto text-center texto-home">
                            <h1>Just a Blog</h1>
                            @guest
                            <p>Bienvenido</p>
                            @else
                            <p>un blog tipo normal</p>
                            @endguest

                    <button type="button" class="btn btn-outline-info btn-lg btnHome"><a href="/post" style="padding:20px 50px"> View Blog</a></button>
                    </div>
                </div>
            </div>




@endsection
