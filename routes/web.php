<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PersonnelController;



Route::get('/accueil', function () {
    return view('layouts.app');
})->name('accueil');

Route::get('/absences/{id}', [PersonnelController::class, 'showpersonnelabsence'])->name('show');


Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);
Route::post('/logout', [CustomAuthController::class, 'logout'

])->name('logout');
