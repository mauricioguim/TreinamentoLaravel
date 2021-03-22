@extends('template')

@section('content')
    <h1>Create new post</h1>

    @if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    {!! Form::open(['route'=>'admin.posts.store','method'=>'post']) !!}

    @include('admin.posts._form')

    <div class="form-group">
    {!! Form::submit('Create Post', null, ['class'=>'btn-primary']) !!}
    </div>



    {!! Form::close() !!}

@endsection