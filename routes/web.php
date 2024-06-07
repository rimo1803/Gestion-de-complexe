<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbscenceController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route pour afficher le formulaire de connexion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);




// Route pour créer un utilisateur
Route::group(['middleware' => 'web'], function () {

});

// Routes accessibles uniquement au personnel

Route::middleware(['auth', 'role:personnel'])->group(function () {
    Route::get('/accueil', [PersonnelController::class, 'home'])->name('accueil');
    Route::get('/demande-conge', [CongeController::class, 'creation'])->name('demande.conge');
    Route::post('/demande-conge', [CongeController::class, 'demanderConge'])->name('demande.conge.submit');
    Route::delete('/demande-conge/{id}', [CongeController::class, 'supprimerDemandeConge'])->name('demande.conge.supprimer');
    Route::get('/mes-demandes-conge', [CongeController::class, 'listeDemandesUtilisateur'])->name('mes_demandes.conge');
    Route::get('/mesabs',[PersonnelController::class,'mesabsc'])->name('mesabsc');
    Route::get('/justifier/{id}', [AbscenceController::class,'showJustifyForm'])->name('justifier');
    Route::post('/justifier/{id}', [AbscenceController::class,'justify'])->name('justify');
    Route::get('/notifications', [NotificationController::class,'index'])->name('notifications');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

// Routes accessibles uniquement aux directeurs
Route::middleware(['auth', 'role:directeur'])->group(function () {
    Route::get('/accueildire', [DirecteurController::class, 'index'])->name('accueildire');
    Route::get('/create-user', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/create-user', [PersonnelController::class, 'store'])->name('personnels.store');
    Route::get('/absences', [AbscenceController::class, 'showabs'])->name('showabs');
    Route::get('/liste', [PersonnelController::class, 'index'])->name('showliste');
    Route::get('/profile/{id}', [PersonnelController::class, 'showProfile'])->name('profile');
    Route::get('/edit/{id}', [PersonnelController::class, 'edit'])->name('Edit');
    Route::put('/edit/{id}', [PersonnelController::class, 'update'])->name('update');
    Route::get('/create-directeur', [DirecteurController::class, 'create'])->name('directeur.create');
    Route::post('/store-directeur', [DirecteurController::class, 'store'])->name('directeur.store');
    Route::get('/abscences/{id}/download', [AbscenceController::class, 'downloadJustification'])->name('downloadJustification');
    Route::post('/abscences/{id}/change-type', [AbscenceController::class, 'changeAbscenceType'])->name('changeAbscenceType');
    Route::get('/notifications', [NotificationController::class, 'index2'])->name('notifications.index');
    Route::get('/notifications/all', [NotificationController::class, 'all'])->name('notifications.all');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


});













Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf');;


Route::get('/export', [PersonnelController::class, 'export'])->name('export');


