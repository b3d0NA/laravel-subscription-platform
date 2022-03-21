<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Website;

class PostController extends Controller
{
    public function index()
    {
        $websites = Website::latest()->get(["id", "name"]);
        $posts = Post::with("website:name,id")->latest()->paginate(10);
        // return view("index", compact("websites", "posts"));
        return response()->json(["posts" => $posts]);
    }

    public function store(PostRequest $request)
    {
        $post = Website::findOrFail($request->website)
            ->posts()
            ->create($request->validated());

        event(new SendEmail($post));

        return response()->json(["post" => $post]);
    }

    public function view(Post $post)
    {
        return response()->json(["post" => $post]);
        // return view("post", ["post" => $post]);
    }
}