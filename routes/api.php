<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMarkerController;
use App\Http\Controllers\ProdutoRequirementController;

Route::get('achievements', [AchievementController::class, 'index']);
Route::post('achievements', [AchievementController::class, 'store']);
Route::get('achievements/{id}', [AchievementController::class, 'show']);
Route::put('achievements/{id}', [AchievementController::class, 'update']);
Route::delete('achievements/{id}', [AchievementController::class, 'destroy']);

Route::get('product-assets', [ProductAssetController::class, 'index']);
Route::post('product-assets', [ProductAssetController::class, 'store']);
Route::get('product-assets/{id}', [ProductAssetController::class, 'show']);
Route::put('product-assets/{id}', [ProductAssetController::class, 'update']);
Route::delete('product-assets/{id}', [ProductAssetController::class, 'destroy']);

Route::get('avaliations', [AvaliationController::class, 'index']);
Route::post('avaliations', [AvaliationController::class, 'store']);
Route::get('avaliations/{id}', [AvaliationController::class, 'show']);
Route::delete('avaliations/{id}', [AvaliationController::class, 'destroy']);
Route::put('avaliations/{id}', [AvaliationController::class, 'update']);

Route::get('categorys', [CategoryController::class, 'index']);
Route::post('categorys', [CategoryController::class, 'store']);
Route::get('categorys/{id}', [CategoryController::class, 'show']);
Route::delete('categorys/{id}', [CategoryController::class, 'destroy']);
Route::put('categorys/{id}', [CategoryController::class, 'update']);

Route::get('markers', [MarkerController::class, 'index']);
Route::post('markers', [MarkerController::class, 'store']);
Route::get('markers/{id}', [MarkerController::class, 'show']);
Route::delete('markers/{id}', [MarkerController::class, 'destroy']);
Route::put('markers/{id}', [MarkerController::class, 'update']);

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);
Route::put('products/{id}', [ProductController::class, 'update']);

Route::get('product-markers', [ProductMarkerController::class, 'index']);
Route::post('product-markers', [ProductMarkerController::class, 'store']);
Route::get('product-markers/{id}', [ProductMarkerController::class, 'show']);
Route::delete('product-markers/{id}', [ProductMarkerController::class, 'destroy']);
Route::put('product-markers/{id}', [ProductMarkerController::class, 'update']);

Route::get('requirements', [ProdutoRequirementController::class, 'index']);
Route::post('requirements', [ProdutoRequirementController::class, 'store']);
Route::get('requirements/{id}', [ProdutoRequirementController::class, 'show']);
Route::delete('requirements/{id}', [ProdutoRequirementController::class, 'destroy']);
Route::put('requirements/{id}', [ProdutoRequirementController::class, 'update']);



