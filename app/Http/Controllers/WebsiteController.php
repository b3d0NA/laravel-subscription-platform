<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function create()
    {
        return view("create-website");
    }

    public function store(WebsiteRequest $request)
    {
        Website::create($request->validated());

        return redirect()->back()->with("success", "Website created succesfully");
    }
}