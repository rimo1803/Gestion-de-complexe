<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CongeController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\PersonnelController;
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

Route::get('/demande-conge', [CongeController::class, 'creation'])->name('demande.conge');
Route::post('/demande-conge', [CongeController::class, 'demanderConge'])->name('demande.conge.submit');
Route::delete('/demande-conge/{id}', [CongeController::class, 'supprimerDemandeConge'])->name('demande.conge.supprimer');
Route::put('/demande-conge/{id}/valider', [CongeController::class, 'validerDemandeConge'])->name('demande.conge.valider');
Route::put('/demande-conge/{id}/refuser', [CongeController::class, 'refuserDemandeConge'])->name('demande.conge.refuser');

Route::group(['middleware' => 'web'], function () {
    Route::get('/create-user', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/create-user', [PersonnelController::class, 'store'])->name('personnels.store');
});

Route::get('/accueil', function () {
    return view('layouts.mainuser');
})->name('accueil');
Route::get('/accueildire', function () {
    return view('layouts.mainadmin');
})->name('accueildire');
Route::get('/absences/{id}', [PersonnelController::class, 'showpersonnelabsence'])->name('show');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile');



