<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbscenceController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PasswordController;

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
    Route::get('/accueil', [PersonnelController::class, 'acceuil'])->name('accueil');
    Route::get('/demande-conge', [CongeController::class, 'creation'])->name('demande.conge');
    Route::post('/demande-conge', [CongeController::class, 'demanderConge'])->name('demande.conge.submit');
    Route::get('/mesabs',[PersonnelController::class,'mesabsc'])->name('mesabsc');
    Route::delete('/demande-conge/{id}', [CongeController::class, 'supprimerDemandeConge'])->name('demande.conge.supprimer');
    Route::get('/mes-demandes-conge', [CongeController::class, 'listeDemandesUtilisateur'])->name('mes_demandes.conge');
    Route::get('/absences', [AbscenceController::class, 'showpersonnelabsence'])->name('showabsper');
    Route::get('/mesabs',[PersonnelController::class,'mesabsc'])->name('mesabsc');
    Route::get('/justifier/{id}', [AbscenceController::class,'showJustifyForm'])->name('justifier');
    Route::post('/justifier/{id}', [AbscenceController::class,'justify'])->name('justify');
    Route::get('/notifications', [NotificationController::class,'index'])->name('notifications');
    Route::get('/attestations', [AttestationController::class, 'index'])->name('attestations.index');
    Route::get('/attestations/{attestation}/download', [AttestationController::class, 'download'])->name('attestations.download');
    Route::get('/attestations/create', [AttestationController::class, 'create'])->name('attestations.create');
    Route::post('/attestations', [AttestationController::class, 'store'])->name('attestations.store');
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
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notification.show');
    Route::post('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('conges', CongeController::class)->names('conges');
    Route::get('conges/{conge}', [CongeController::class, 'show'])->name('conges.show');

    Route::post('conges/{conge}/decision', [CongeController::class, 'decision'])->name('conges.decision');
    Route::get('conges/{conge}/download', [CongeController::class, 'downloadDecision'])->name('conges.download');
    Route::get('conges/pending', [CongeController::class, 'showPendingRequests'])->name('conges.pending');
    Route::post('/conges/edit/{id}', [CongeController::class, 'update'])->name('conges.update');
    Route::put('/conges/{conge}', 'App\Http\Controllers\CongeController@update')->name('conges.update');

    Route::prefix('missions')->name('missions.')->group(function () {
        Route::get('/', [MissionController::class, 'index'])->name('index');
        Route::get('/create', [MissionController::class, 'create'])->name('create');
        Route::post('/', [MissionController::class, 'store'])->name('store');
        Route::get('/{mission}/edit', [MissionController::class, 'edit'])->name('edit');
        Route::put('/{mission}', [MissionController::class, 'update'])->name('update');
        Route::get('/{mission}/download-pdf', [MissionController::class, 'downloadPDF'])->name('downloadPDF');
    });
});



Route::middleware(['auth'])->group(function () {

    Route::middleware('role:personnel')->group(function () {
        Route::get('/mission', [MissionController::class, 'personnelMissions'])->name('missions.personnelMissions');
        Route::get('/missions/{mission}/fill-transport-form', [MissionController::class, 'fillTransportForm'])->name('missions.fillTransportForm');
        Route::post('/missions/{mission}/fill-transport-form', [MissionController::class, 'storeTransportForm'])->name('missions.storeTransportForm');
        Route::get('/missions/{mission}/download-mission-order', [MissionController::class, 'downloadMissionOrder'])->name('missions.downloadMissionOrder');
    });


});









Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf');;


Route::get('/export', [PersonnelController::class, 'export'])->name('export');




Route::middleware(['auth'])->group(function () {
    // Afficher le formulaire de modification du mot de passe
    Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');

    // Traiter la demande de modification du mot de passe
    Route::post('/password/change', [PasswordController::class, 'changePassword'])->name('password.update');
});
