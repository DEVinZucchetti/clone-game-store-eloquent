<?php

use App\Http\Controllers\ProductMarkerController;
use Illuminate\Support\Facades\Route;

Route::get('markers', [MarkerController::class, 'index']);
Route::post('markers', [MarkerController::class, 'store']);

Route::get('product_markers', [ProductMarkerController::class, 'index']);
Route::post('product_markers', [ProductMarkerController::class, 'store']);
