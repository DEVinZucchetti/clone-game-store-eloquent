<?php
use Illuminate\Support\Facades\Route;

// implemente sua rota;

Route::resource('avaliations', \App\Http\Controllers\AvaliationController::class);
