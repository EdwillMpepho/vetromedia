<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

//Route for displaying register screen
Route::get('register/view',[AuthController::class,'registerView'])->name('user.register.view');
//Route for displaying login screen
Route::get('login/view',[AuthController::class,'loginView'])->name('user.login.view');
//Route for registering user
Route::post('register',[AuthController::class,'register'])->name('user.register');
//Route for login user
Route::post('login',[AuthController::class,'login'])->name('user.login');
//Route for displaying all posts
Route::get('posts',[PostController::class,'index'])->name('posts.index');
//Route for displaying the create post screen
Route::get('post/create',[PostController::class,'create'])->name('post.create');


//Protected routes are accessed by users who are authorized
Route::middleware(['auth'])->group(function () {
   //Route logout
   Route::post('logout',[AuthController::class,'logout'])->name('logout'); 
});





