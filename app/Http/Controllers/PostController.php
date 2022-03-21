<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Website;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        Website::findOrFail($request->website)
            ->posts
            ->create($request->validated());

        return redirect()->back()->with("success", "Posted succesfully");
    }
}