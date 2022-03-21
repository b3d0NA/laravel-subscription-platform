<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post("posts", [PostController::class, "store"])->name("posts.store");

Route::get('posts/{post:id}', [PostController::class, "view"])->name("posts.view");

Route::get('websites', [WebsiteController::class, "create"])->name("website.create");
Route::post('websites', [WebsiteController::class, "store"])->name("website.store");

Route::post("subscribe/{website:id}", [SubscriptionController::class, "store"])->name("subs.store");
Route::get('/', [PostController::class, "index"])->name("posts.index");