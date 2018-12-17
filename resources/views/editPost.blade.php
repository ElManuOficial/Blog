@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/post-update/{{$post->id}}">
            @csrf

            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" name="title" id="" class="form-control" placeholder="Titulo del tema" aria-describedby="helpId"
                    value="{{ $post->title}}">
                    {{$errors->first('title')}}
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea rows="8" type="textarea" name="content" id="" class="form-control" placeholder="Titulo del tema" aria-describedby="helpId"
                    >{{ $post->content}}</textarea>
                    {{$errors->first('content')}}
                <br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Editar Post</button>
            </div>

        </form>
    </div>
    @if (session()->has('message'))

        <p class="text-success">{{session()->get('message')}}</p>

    @endif



@endsection
