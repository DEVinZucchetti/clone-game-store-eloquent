<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMarkerController;
use App\Http\Controllers\ProductRequirementController;

Route::resource('achievements', AchievementController::class)->except(['create', 'edit']);
Route::resource('product-assets', ProductAssetController::class)->except(['create', 'edit']);
Route::resource('avaliations', AvaliationController::class)->except(['create', 'edit']);
Route::resource('categorys', CategoryController::class)->except(['create', 'edit']);
Route::resource('markers', MarkerController::class)->except(['create', 'edit']);
Route::resource('products', ProductController::class)->except(['create', 'edit']);
Route::resource('product-markers', ProductMarkerController::class)->except(['create', 'edit']);
Route::resource('requirements', ProductRequirementController::class)->except(['create', 'edit']);
