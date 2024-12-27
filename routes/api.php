<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\AttributeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create', [Product_Controller::class,'create'])->name('products.create');
Route::get('/edit/{id}', [Product_Controller::class,'edit'])->name('products.edit');
Route::delete('/products/{id}', [Product_Controller::class,'destroy'])->name('products.destroy');
Route::put('/products/{id}', [Product_Controller::class,'update'])->name('products.update');
Route::post('/products', [Product_Controller::class,'store'])->name('products.store');

Route::get('attributes', [AttributeController::class, 'index']);
    
// Create a new attribute
Route::post('attributes', [AttributeController::class, 'store']);

// Get a specific attribute by ID
Route::get('attributes/{id}', [AttributeController::class, 'show']);

// Update an existing attribute
Route::put('attributes/{id}', [AttributeController::class, 'update']);

// Delete an attribute
Route::delete('attributes/{id}', [AttributeController::class, 'destroy']);
