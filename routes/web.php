<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\AttributeController;
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

Route::get('/', [Product_Controller::class, 'index'])->name('products.index');
Route::get('/attribute', function () {
    return view('attribute');
});
Route::get('/create', function () {
    return view('welcome');
});
Route::get('/edit/{id}', function () {
    return view('edit');
});
Route::resource('attributes', AttributeController::class);