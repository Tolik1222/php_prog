<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/author', [MainController::class, 'author']);
Route::get('/form', [FormController::class, 'show']);
Route::post('/form', [FormController::class, 'process']);