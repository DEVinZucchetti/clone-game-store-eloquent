<?php

use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

Route::get('achievements', [AchievementController::class, 'index']);
Route::post('achievements', [AchievementController::class, 'store']);
Route::put('achievements', [AchievementController::class, 'update']);
Route::delete('achievements', [AchievementController::class, 'destroy']);


