<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Accueil_personnel.welcome'); 
})->name('accueil');

Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
