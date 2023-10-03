<?php

use App\Http\Controllers\IndexController;
use App\Models\Group;
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
Route::redirect('/', '/products');
Route::resource('/products', ProductController::class);
// Route::get('/', function () {
//     return view('welcome');
// });

// Protected 

// ----------------------------

Route::get('/login', function () {
    session()->put('user_id', 1);
    echo "Logged In";
});
Route::get('/logout', function () {
    session()->forget('user_id');
    echo "Logged Out";
});


Route::get('/relation', [IndexController::class, 'userRoles']);
Route::get('/data', [IndexController::class, 'index']);
Route::get('/user', [IndexController::class, 'user']);
Route::get('/belong', [IndexController::class, 'belong']);
Route::get('/no-access', function () {
    echo "You are not allowed to access the page.";
    die;
});


Route::middleware(['guard'])->group(function () {
    Route::get('/roles', [IndexController::class, 'getRolerelation']);
    Route::get('/get', [IndexController::class, 'get']);
});

// Route::resource('products', ProductController::class);
// Products Crud 
Route::view('view', 'products.create');

// hasOneThrough
Route::get('/owner', [IndexController::class, 'owner']);

// hasManyThrough
Route::get('/many', [IndexController::class, 'many']);