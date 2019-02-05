
@extends('layouts.app')

@section('content')


    <div class="jumbotron jumbotron-fluid" style="background-color:transparent">
        <div class="container">
            <h1 class="display-3">{{$post->title}}</h1>
            <p class="lead">Creado el: {{date_format(new DateTime($post->created_at),'d-m-y')}} por: {{$post->user->name}} </p>
            <hr class="my-2">
            <div class="container" style="background-color:rgba(13, 11, 11, 0.60)">
                <p class="lead p-5" style="color:#ffffff">{{$post->content}} </p>
            </div>
            @guest <!--Si no esta loggeado no puede modificar ni eliminar un post-->
                <p class="lead text-center text-danger font-weight-bold">No puedes modificar ni eliminar un post sin Loggearte</p>
                @else
                <div class="container d-inline">

                    <a class="btn btn-primary btn-lg d-inline h-100" href="/post-edit/{{$post->id}}" role="button">Editar Post</a>
                    <form action="/post-delete/{{$post->id}}" method="post" class="d-inline">
                        @csrf
                        <input type="submit" class="btn btn-danger btn-lg border-3" value="Eliminar">
                    </form>

                    @if ($id_user==Auth::id())
                        <!--ESTE USUARIO YA LE DIO LIKE SI PULSA AQUI DEBERIA DAR DISLIKE-->
                        <form action="/post-dis-like/{{$post->id}}" method="post" class="d-inline">
                            @csrf
                                <button type="submit" class="btn btn-info btn-lg border-3">
                                        <i class="fas fa-heart hasLike d-inline"></i>
                                        {{$likes->count()}}
                                </button>
                        </form>
                    @else
                        <!--ESTE USUARIO NO LE HA DADO LIKE SI PULSA AQUI DEBERIA DAR LIKE-->
                        <form action="/post-like/{{$post->id}}" method="post" class="d-inline">
                            @csrf
                                <button type="submit" class="btn btn-info btn-lg border-3">
                                        <i class="fas fa-heart d-inline"></i>
                                        {{$likes->count()}}
                                </button>
                        </form>

                    @endif
                    <!--FIN REVISAR ESTE CODIGO -->



                </div>


            @endguest

        </div>
    </div>





@endsection
