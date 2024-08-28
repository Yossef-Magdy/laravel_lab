<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCreator;
use Illuminate\Support\Facades\File; 

class PostController extends Controller
{
    public function home() {
        return view('posts.home');
    }
    public function index() {
        $posts = Post::paginate(3);
        return view('posts.index', ["posts"=>$posts]);
    }
    public function create() {
        $creators = PostCreator::all(["id", "name"]);
        return view('posts.create', ['creators'=>$creators]);
    }
    public function store(StorePostRequest $request) {
        dd($request);
        $image_path = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store("", "posts_images");
        }
        $data = $request->all();
        $data['image'] = $image_path;
        Post::create($data);
        return to_route("posts.index");
    }

    public function show(Post $post) {
        return view('posts.show', compact("post"));
    }

    public function edit(Post $post) {
        $creators = PostCreator::all(["id", "name"]);
        return view('posts.edit', compact("post", "creators"));
    }
    public function update(UpdatePostRequest $request, Post $post) {
        $image_path = $post->image;
        if ($request->hasFile('image')) {
            $this->deleteImageIfExists("images/posts/", $image_path);
            $image = $request->file('image');
            $image_path = $image->store("", "posts_images");
        }
        $data = $request->all();
        $data['image'] = $image_path;
        $post->update($data);
        return to_route('posts.index');
    }
    public function destroy(Post $post) {
        $image_path = $post->image;
        $this->deleteImageIfExists("images/posts/", $image_path);
        $post->delete();
        return to_route("posts.index")->with('success', 'Post deleted successfully');;
    }
    private function deleteImageIfExists($prefix, $path) {
        if (file_exists($prefix.$path)) {
            File::delete($prefix.$path);
        }
    }
}
