@extends('layouts.app')
@section('title')
    Edit post
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route("posts.update", $post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" type="text" id="title" name="title" value="{{old('title') ? old('title') : $post['title']}}">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{old('description') ? old('description') : $post['description']}}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label class="form-label" for="image">Select an image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="post_creator_id">Posted by</label>
            <select class="form-control" id="post_creator_id" name="post_creator_id">
                <option disabled>Select a Poster</option>
                @foreach($creators as $creator) 
                @if (old('post_creator_id'))
                <option value="{{$creator->id}}" {{old('post_creator_id') == $creator->id ? "selected" : ''}}>{{$creator->name}}</option>
                @else
                <option value="{{$creator->id}}" {{$post->post_creator_id == $creator->id ? "selected" : ''}}>{{$creator->name}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection