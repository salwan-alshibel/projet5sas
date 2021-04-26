<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InfoController;


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MainController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\HomeController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
// Route::get('/', [MainController::class, 'home']);

// Route::get('welcome', function () {
//     return view('welcome');
// });

// Route::get('home', [HomeController::class, 'index']);


// Route::get('test', function () {
//     return view('test');
// });

// Route::get('/user/{id}', [UserController::class, 'show']);


Route::get('/', function () {return view('home');})->name('home');

Route::get('Accueil', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    //->middleware('auth');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

//Products Pages:
Route::get('Warhammer-Age-of-Sigmar', [ProductsController::class, 'waos'])->name('waos');
Route::get('Warhammer-40-000', [ProductsController::class, 'w40k'])->name('w40k');
Route::get('Peintures', [ProductsController::class, 'paints'])->name('paints');


Route::get('info-paiement-sécurisé', [InfoController::class, 'info_safe_payment'])->name('info_safe_payment');
Route::get('conditions-de-ventes', [InfoController::class, 'info_sales_conditions'])->name('info_sales_conditions');
