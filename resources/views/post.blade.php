@extends('layouts.app')

@section('content')

    <div class="container">
        @guest <!--Si no esta no puede crear un post-->
            <div class="container" style="background-color:rgba(13, 11, 11, 0.60)">
                <p class="lead text-center text-danger font-weight-bold p-5 m-5" style="color:#ffffff">No puedes Crear un post sin Loggearte</p>
            </div>

        @else
            <div class="row">

                <div class="col align-self-center text-alig">
                    <form method="POST" action="/post">
                        @csrf

                        <div class="form-group">
                        <label for="tema">Tema</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="Titulo del tema" aria-describedby="helpId"
                            value="{{ old('title')}}">
                            {{$errors->first('title')}}
                        </div>
                        <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea rows="8" type="textarea" name="content" id="" class="form-control" placeholder="Titulo del tema" aria-describedby="helpId"
                            >{{ old('content')}}</textarea>
                            {{$errors->first('content')}}
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Crear Post</button>
                        </div>

                        </div>


                    </form>
                    @if (session()->has('message'))

                        <p class="text-success">{{session()->get('message')}}</p>

                    @endif

                </div>


            </div>
        @endguest



        <div class="row">

            <div class="col align-self-center text-alig">
                @include('listPosts')
            </div>

        </div>

    </div>





@endsection



