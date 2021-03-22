@extends('template')

@section('content')

    <h1>Blog</h1>

    @foreach($posts as $post)

        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>

        <h3>Comentário</h3>
        @foreach($post->comments as $comment)
            <b>Nome: </b> {{ $comment->name }}
            <b>Comentário: </b> {{$comment->comment}}<br>
        @endforeach
        <hr>
        
    @endforeach
@endsection