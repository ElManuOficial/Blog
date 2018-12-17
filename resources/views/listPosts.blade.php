
<div class="card">
    <table class="table table-striped table-bordered rounded">
        
        <thead class="">
            <tr>
                <th class="p-5">Titulo</th>
                <th class="">Creado por:</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
            <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
                <td>{{$post->user->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>
