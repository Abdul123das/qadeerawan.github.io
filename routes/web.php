<?php

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


Route::get('/test', [ProductController::class, 'index'])->name('test.index');
Route::get('/test/create', [ProductController::class, 'create']);
Route::post('/test/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/test/show/{id}', [ProductController::class, 'show'])->name('test.show');
Route::get('/test/edit/{id}', [ProductController::class, 'edit'])->name('test.edit');
Route::POST('/test/update/{id}', [ProductController::class, 'update'])->name('test.update');
Route::get('/test/delete/{id}', [ProductController::class, 'destroy'])->name('test.destroy');




Route::get('/sale', [ProductController::class, 'sale_index'])->name('sale.index');
Route::get('/sale/create', [ProductController::class, 'sale_create']);
Route::post('/sale/store', [ProductController::class, 'sale_store'])->name('sale.store');
Route::get('/sale/show/{id}', [ProductController::class, 'sale_show'])->name('sale.show');
Route::get('/sale/edit/{id}', [ProductController::class, 'sale_edit'])->name('sale.edit');
Route::POST('/sale/update/{id}', [ProductController::class, 'sale_update'])->name('sale.update');
Route::get('/sale/delete/{id}', [ProductController::class, 'sale_destroy'])->name('sale.destroy');

