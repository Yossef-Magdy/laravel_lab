@extends('layouts.app')

@section('title')
    Home
@endsection
@section('content')
    <div class="">
        <p class="display-3">Welcome to the posts app</p>
        <p class="display-3"><a href="{{route("posts.create")}}">Create</a> a new post</p>
    </div>
@endsection