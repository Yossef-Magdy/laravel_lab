<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;
Route::get("/",[PostController::class, "home"] )->name("posts.home");
// Route::get("/posts",[PostController::class, "index"] )->name("posts.index");
// Route::get("/posts/create",[PostController::class, "create"] )->name("posts.create");
// Route::get("/posts/{id}",[PostController::class, "show"] )->name("posts.show")->where('id', '[0-9]+');
// Route::get("/posts/edit/{id}",[PostController::class, "edit"] )->name("posts.edit")->where('id', '[0-9]+');
// Route::get("/posts/delete/{id}", [PostController::class, "delete"])->name("posts.delete");
// Route::post("/posts", [PostController::class, "save"])->name("posts.save");
// Route::post("/posts/update/{id}", [PostController::class, "update"])->name("posts.update");

Route::resource("/posts", PostController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
