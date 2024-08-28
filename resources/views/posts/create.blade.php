@extends('layouts.app')
@section('title')
Create post
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
<form action="{{route("posts.store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">

        <label class="form-label" for="title">Title</label>
        <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="image">Select an image</label>
        <input class="form-control" type="file" name="image" id="image">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="post_creator_id">Posted by</label>
        <select class="form-control" id="post_creator_id" name="post_creator_id">
            <option disabled selected >Select a Poster</option>
            @foreach($creators as $creator) 
            <option value="{{$creator->id}}" {{old('post_creator_id') == $creator->id ? "selected" : ''}}>{{$creator->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary"> submit </button>
</form>
@endsection