<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InfoController;
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


//HOME
Route::get('/', function () {return view('home');})->name('home');
Route::redirect('/', '/accueil');
Route::get('accueil', [HomeController::class, 'index'])->name('home');



//DASHBOARD USERS
Route::get('/mon-profil', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/modifier-profil', [DashboardController::class, 'updateProfile'])->name('dashboard.modifier-profil');
Route::post('/dashboard/modifier-profil', [DashboardController::class, 'updateProfile']);

Route::get('/dashboard/changer-mot-de-passe', [DashboardController::class, 'updatePassword'])->name('dashboard.updatePassword');
Route::post('/dashboard/changer-mot-de-passe', [DashboardController::class, 'updatePassword']);

Route::get('/dashboard/mes-commentaires', [DashboardController::class, 'myPosts'])->name('dashboard.myPosts');

Route::get('/dashboard/commandes-en-cours', [DashboardController::class, 'myActualOrders'])->name('dashboard.myActualOrders');

Route::get('/dashboard/historique-commandes', [DashboardController::class, 'myOldOrders'])->name('dashboard.myOldOrders');



//DASHBOARD ADMIN
Route::get('/dashboard/ajouter-un-produit', [DashboardController::class, 'addProduct'])->name('addProduct');
Route::post('/dashboard/ajouter-un-produit', [DashboardController::class, 'addProduct']);
Route::get('/dashboard/nouvelles-commandes', [DashboardController::class, 'newOrders'])->name('newOrders');
Route::POST('/dashboard/nouvelles-commandes', [DashboardController::class, 'updateShipping'])->name('update.shipping');
Route::get('/dashboard/anciennes-commandes', [DashboardController::class, 'oldOrders'])->name('oldOrders');



//LOGIN LOGOUT REGISTER
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);



//POSTS
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');



//USER POSTS
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');



//SHOP
Route::get('Warhammer-Age-of-Sigmar', [ProductsController::class, 'waos'])->name('waos');
Route::get('Warhammer-40-000', [ProductsController::class, 'w40k'])->name('w40k');
Route::get('Peintures', [ProductsController::class, 'paints'])->name('paints');
Route::get('product/{id}/{slug}', [ProductsController::class, 'product'])->name('product');
Route::get('categorie/{id}', [ProductsController::class, 'viewByCategory'])->name('viewByCategory');
Route::post('/search', [ProductsController::class, 'search'])->name('products.search');



//SHOPPING CART
Route::get('panier', [CartController::class, 'index'])->name('cart');
Route::post('panier/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('panier/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('panier/remove/{id}', [CartController::class, 'removeProductFromCart'])->name('cart.remove');



//CHECKOUT
Route::get('paiement', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('paiement', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('paiement-ok', [CheckoutController::class, 'paiement_ok']);



//SALES CONDITIONS
Route::get('conditions-de-ventes', [InfoController::class, 'info_sales_conditions'])->name('info_sales_conditions');