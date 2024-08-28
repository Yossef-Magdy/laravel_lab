@extends('layouts.app')

@section('title')
    Posts
@endsection
@section('content')
    <table class="table">
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Posted by </th>
            <th> Created At </th>
            <th> Actions </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->postCreators->name}}</td>
                <td>{{$post->created_at->toDateString()}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route("posts.show", $post)}}" class="btn btn-info">View</a>
                        <a href="{{route("posts.edit", $post)}}" class="btn btn-primary ms-1">Edit</a>
                        <form action="{{route("posts.destroy", $post)}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" value="Delete" class="btn btn-danger ms-1">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="{{route("posts.create")}}">Create</a>
    @if (session('success'))
    <div class="alert alert-success mt-2">
        <span>{{session('success')}}</span>
    </div>
    @endif
    {{$posts->links()}}
@endsection
