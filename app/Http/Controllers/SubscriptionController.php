<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Website;

class SubscriptionController extends Controller
{
    public function store(Website $website, SubscribeRequest $request)
    {
        $website->subscribers()->create($request->validated());

        return response()->json(["status" => "200", "message" => "Success"]);
    }
}