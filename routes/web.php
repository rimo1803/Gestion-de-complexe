<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\AbscenceController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonnelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route pour afficher le formulaire de connexion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// Route pour afficher le formulaire de demande de congé
Route::get('/demande-conge', [CongeController::class, 'creation'])->name('demande.conge');
Route::post('/demande-conge', [CongeController::class, 'demanderConge'])->name('demande.conge.submit');
Route::delete('/demande-conge/{id}', [CongeController::class, 'supprimerDemandeConge'])->name('demande.conge.supprimer');
Route::get('/mes-demandes-conge', [CongeController::class, 'listeDemandesUtilisateur'])->name('mes_demandes.conge');


// Route pour créer un utilisateur
Route::group(['middleware' => 'web'], function () {
    Route::get('/create-user', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/create-user', [PersonnelController::class, 'store'])->name('personnels.store');
});


Route::get('/accueil', function () {
    return view('layouts.main');
})->name('accueil');

Route::get('/accueildire', [DirecteurController::class, 'index'])->name('accueildire');

Route::middleware(['auth'])->group(function () {
    Route::get('/absences', [AbscenceController::class, 'showpersonnelabsence'])->name('showabsper');
});

Route::get('/absences', [AbscenceController::class, 'showabs'])->name('showabs');


Route::get('/liste', [PersonnelController::class, 'index'])->name('showliste');


Route::get('/profile/{id}', [PersonnelController::class, 'showProfile'])->name('profile');


Route::get('/edit/{id}', [PersonnelController::class, 'edit'])->name('Edit');
Route::put('/edit/{id}', [PersonnelController::class, 'update'])->name('update');

Route::get('/create-directeur', [DirecteurController::class, 'create'])->name('directeur.create');
Route::post('/store-directeur', [DirecteurController::class, 'store'])->name('directeur.store');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf');;


Route::get('/export', [PersonnelController::class, 'export'])->name('export');


