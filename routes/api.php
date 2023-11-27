<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;

Route::get('asset', [AssetController::class, 'index']);
Route::post('asset', [AssetController::class, 'store']);
Route::put('asset{id}', [AssetController::class, 'update']);
Route::delete('asset{id}', [AssetController::class, 'destroy']);
