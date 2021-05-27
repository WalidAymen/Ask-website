<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect(url('/allusers'));
});
Route::get("/message/{id}",[MessageController::class,'show'])->middleware('auth');
Route::get("/message/send/{id}",[MessageController::class,'sendForm']);
Route::post("/message/send/{id}",[MessageController::class,'send']);
Route::get('/reply/{id}', [MessageController::class, 'replyForm']);
Route::post('/reply/{id}', [MessageController::class, 'reply']);
Route::get('/delete/{id}', [MessageController::class, 'delete']);



Route::get('/register', [AuthController::class, 'registerForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/me', [UserController::class, 'showProfile'])->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::get('/edit/{id}', [UserController::class, 'editForm'])->middleware('auth');
Route::get('/allusers', [UserController::class, 'showAll']);
Route::get('/pending/{id}', [UserController::class, 'pending']);

Route::get('/search', [UserController::class, 'search']);


Route::fallback(function() {
    return redirect(url('/allusers'));
});
