@extends('template')

@section('content')
    <h1>Blog admin</h1>

    <a href="{{route('admin.posts.create')}}" class="btn btn-sucess">Create new post</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td> 
            <a href="{{ route('admin.posts.edit', ['id'=> $post->id]) }}" class="btn btn-default" > Edit </a></td>
            <br>
            <a href="{{ route('admin.posts.destroy', ['id'=> $post->id]) }}" class="btn btn-danger" > Destroy </a></td>

        </tr>
        @endforeach
    </table>

    {!! $posts->render() !!}

@endsection