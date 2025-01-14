@extends('layouts.app')

@section('content')
<h1>Edit</h1>
{{-- <form method="post" action="/posts/{{$post->id}}"> --}}
    
{!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostController@update', $post->id]]) !!}
    {{csrf_field()}}
    {!! Form::label('title', 'Post Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    
    {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}

    {{-- <input type="hidden" name="_method" value="PUT">

    <input type="text" name="title" value="{{$post->title}}" placeholder="Enter title">

    <input type="submit" name="submit" value="Update"> --}}
{{-- </form> --}}

{!! Form::close() !!}

{{-- <form method="post" action="/posts/{{$post->id}}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">

    <input type="submit" value="Delete">
</form> --}}

{!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
{{csrf_field()}}
{!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection
