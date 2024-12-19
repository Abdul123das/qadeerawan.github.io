<?php

use App\Http\Controllers\ProductController;

Route::post('/create', [ProductController::class, 'create_api']);
Route::get('/getList', [ProductController::class, 'getList']);
Route::put('/updateSale/{id}', [ProductController::class, 'updateSale']);
Route::delete('/deleteSale/{id}', [ProductController::class, 'deleteSale']);
