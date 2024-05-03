<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\PersonnelController;

use App\Http\Controllers\CongeController;

use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Route pour afficher le formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', [AuthController::class, 'login']);



// Route pour afficher le formulaire de demande de congé
Route::get('/demande-conge', [CongeController::class, 'creation'])->name('demande-conge');
    // Route pour traiter la suppression d'une demande de congé
Route::delete('/demande-conge/{id}', [CongeController::class, 'delete'])->name('conge.delete');

Route::group(['middleware' => 'web'], function () {
    Route::get('/create-user', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/create-user', [PersonnelController::class, 'store'])->name('personnels.store');
});






Route::get('/accueil', function () {
    return view('layouts.main');
})->name('accueil');

Route::get('/absences/{id}', [PersonnelController::class, 'showpersonnelabsence'])->name('show');



