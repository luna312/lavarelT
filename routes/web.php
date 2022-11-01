<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/delete-product/{id_product}',[ProductController::class,'delete_product']);
Route::get('/edit-product/{id_product}',[ProductController::class,'edit_product']);
Route::post('/update-product/{id_product}',[ProductController::class,'update_product']);
Route::get('/save-product',[ProductController::class,'save_product']);

