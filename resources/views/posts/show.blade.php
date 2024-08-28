@extends('layouts.app')
@section('title')
    Posts
@endsection

@section('content')
    <div class="card" style="width: 20rem">
        <img src="{{asset("images/posts/".$post->image)}}" alt="" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$post['title']}}</h5>
            <p class="card-text">{{$post['description']}}</p>
        </div>
    </div>
@endsection