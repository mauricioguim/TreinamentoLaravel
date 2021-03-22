@extends('template')

@section('content')
    <h1>Edit Post: {{ $post->title }}</h1>

    @if($errors->any())

    <ul> class="alert">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    {!! Form::model($post, ['route'=> ['admin.posts.update', $post->id], 'method'=>'post']) !!}
    @csrf
    @method('put')
    @include('admin.posts._form')

    <div class="form-group">
    {!! Form::submit('Save', null, ['class'=>'btn-primary']) !!}
    </div>



    {!! Form::close() !!}

@endsection