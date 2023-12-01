<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ProductMarkerController;
use App\Http\Controllers\ProductRequirementController;

Route::get('achievements', [AchievementController::class, 'index']);
Route::post('achievements', [AchievementController::class, 'store']);
Route::put('achievements', [AchievementController::class, 'update']);
Route::delete('achievements', [AchievementController::class, 'destroy']);

Route::get('markers', [MarkerController::class, 'index']);
Route::post('markers', [MarkerController::class, 'store']);

Route::resource('avaliations', \App\Http\Controllers\AvaliationController::class);

Route::get('product_markers', [ProductMarkerController::class, 'index']);
Route::post('product_markers', [ProductMarkerController::class, 'store']);

Route::get('asset', [AssetController::class, 'index']);
Route::post('asset', [AssetController::class, 'store']);
Route::put('asset{id}', [AssetController::class, 'update']);
Route::delete('asset{id}', [AssetController::class, 'destroy']);

Route::get('products_requirements', [ProductRequirementController::class, 'index']);
Route::post('products_requirements', [ProductRequirementController::class, 'store']);
Route::delete('products_requirements/{id}', [ProductRequirementController::class, 'destroy']);
Route::put('products_requirements/{id}', [ProductRequirementController::class, 'update']);
