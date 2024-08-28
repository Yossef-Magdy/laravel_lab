<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller {
    private $creators = ['yossef', 'mohamed', 'said'];
    function index() {
        $posts = Post::paginate(3);
        return view('posts.index', ["posts" => $posts]);
    }
    function show($id) {
        $post = Post::find($id);
        if ($post) {
            return view('posts.show', ["post" => $post]);
        }
        abort(404);
    }
    function create() {
        return view('posts.create', ["creators" => $this->creators]);
    }
    function edit($id) {
        $post = Post::find($id);
        if ($post) {
            return view('posts.edit', ["post" => $post, "creators" => $this->creators]);
        }
        abort(404);
    }
    function home() {
        return view("posts.home");
    }
    function save() {
        $valid_data = request()->validate([
            "title" => "required",
            "description" => "required",
            "posted-by" => "required",
        ]);
        $request_data = request()->all();
        $post = new Post();
        $post->title = $request_data['title'];
        $post->description = $request_data['description'];
        $post->posted_by = $request_data['posted-by'];
        $post->save();
        return to_route("posts.index");
    }
    function update($id) {
        $valid_data = request()->validate([
            "title" => "required",
            "description" => "required",
            "posted-by" => "required",
        ]);
        $request_data = request()->all();
        $post = Post::find($id);
        if ($post) {
            $post->title = $request_data['title'];
            $post->description = $request_data['description'];
            $post->posted_by = $request_data['posted-by'];
            $post->update();
            return to_route("posts.index");
        }
        abort(404);
    }
    function delete($id) {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return to_route("posts.index");
        }
        abort(404);
    }
}
