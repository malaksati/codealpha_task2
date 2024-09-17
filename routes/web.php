<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// AUTH
Route::get('/register', [RegisterController::class, "register"]);
Route::post('/register', [RegisterController::class, "handle_register"]);
Route::get('/login', [LoginController::class, "login"])->name('login');
Route::post('/login', [LoginController::class, "handle_login"]);
Route::get('/logout', [LogoutController::class, "logout"]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/profile', [UserController::class, 'index']);
    Route::get('/profile/edit', [UserController::class, 'edit']);
    Route::put('/profile/edit', [UserController::class, 'update']);

    Route::get('/blog/add', [BlogController::class, 'create']);
    Route::post('/blog/add', [BlogController::class, 'store']);
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit']);
    Route::put('/blog/edit/{id}', [BlogController::class, 'update']);
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy']);
    Route::get('/blog/{id}', [BlogController::class, 'index']);

    Route::get('blog_like/{id}', [LikeController::class, 'blog_like']);
    Route::get('comment_like/{id}', [LikeController::class, 'comment_like']);
    Route::get('reply_like/{id}', [LikeController::class, 'reply_like']);

    Route::post('/reply/add/{id}', [ReplyController::class, 'add']);
    Route::post('/reply/add1/{id}', [ReplyController::class, 'add1']);
    Route::post('/comment/add/{id}', [CommentController::class, 'add']);

    Route::get('/comments/{id}', [CommentController::class, 'comment']);
});
