<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [PostController::class, "index"])->name("posts.index");
Route::get('posts/{post:id}', [PostController::class, "view"])->name("posts.view");
Route::post("posts", [PostController::class, "store"])->name("posts.store");

Route::get('websites', [WebsiteController::class, "create"])->name("website.create");
Route::post('websites', [WebsiteController::class, "store"])->name("website.store");

Route::post("subscription/{website:id}", [SubscriptionController::class, "store"])->name("subs.store");