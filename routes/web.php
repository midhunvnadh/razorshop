<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('index');
});




/**
 *
 * Auth Endpoints
 *
 */
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, "login"]);

Route::post('/signup', [UserController::class, "signup"]);
Route::get('/signup', function(){
    return view('signup');
});

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/admin', function(){
    return view("admin");
});

Route::get('/products',[ProductsController::class, 'index']);
Route::post('/products/new',[ProductsController::class, 'insert']);
Route::get('/products/{id}',[ProductsController::class, 'viewProduct']);
Route::get('/products/{id}/image',[ProductsController::class, 'image']);


Route::get('/cart',[CartController::class, 'view']);
Route::post('/cart/{id}/add',[CartController::class, 'add']);
Route::post('/cart/{id}/delete',[CartController::class, 'delete']);
