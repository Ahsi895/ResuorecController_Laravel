<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/data', [IndexController::class, 'index']);
Route::get('/user', [IndexController::class, 'user']);
Route::get('/belong', [IndexController::class, 'belong']);
Route::get('/roles', [IndexController::class, 'getRolerelation']);
Route::get('/relation', [IndexController::class, 'relation']);
Route::get('/get', [IndexController::class, 'get']);

Route::resource('products',ProductController::class);

// Route::resource('products', ProductController::class);

Route::view('view', 'products.create');