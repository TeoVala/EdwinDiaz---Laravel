@extends('layouts.app')

@section('content')

<h1>{{$post->title}}</h1>
<div>
    <a href="{{route("posts.edit", $post->id)}}">
    Edit
</a>
</div>

@endsection