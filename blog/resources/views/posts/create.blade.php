@extends('layouts.app')

@section('content')

<h1>Create</h1>
{{-- <form method="post" action="/posts"> --}}
    {!! Form::open(['action' => 'App\Http\Controllers\PostController@store', 'method' => 'POST', 'files'=>true]) !!}
    @csrf

    

    <div class="form-group">
        {!! Form::label('title', 'Post Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::file('file', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}
{{-- </form> --}}


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

@endsection