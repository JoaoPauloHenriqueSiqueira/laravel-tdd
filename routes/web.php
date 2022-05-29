<?php

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
Route::post('/book', [\App\Http\Controllers\BookController::class, 'store']);
Route::patch('/book/{book}-{slug}', [\App\Http\Controllers\BookController::class, 'update']);
Route::delete('/book/{book}-{slug}', [\App\Http\Controllers\BookController::class, 'destroy']);

Route::post('/author', [\App\Http\Controllers\AuthorController::class, 'store']);

Route::post('/checkout/{book}',  [\App\Http\Controllers\CheckoutBookController::class, 'store']);
Route::post('/checkin/{book}',  [\App\Http\Controllers\CheckinBookController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
