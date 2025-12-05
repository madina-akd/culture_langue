<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\Auth\AuteurAuthController;
use App\Http\Controllers\Auteur\AuteurDashboardController;
use App\Http\Controllers\Auteur\AuteurMediaController;
use App\Http\Controllers\Lecteur\HistoireController;
use App\Http\Controllers\Lecteur\RecetteController;
use App\Http\Controllers\Lecteur\TraditionController;
use App\Http\Controllers\Lecteur\ProfileController;
use App\Http\Controllers\Lecteur\LangController;
use App\Http\Controllers\Lecteur\ReController;
use App\Http\Controllers\Lecteur\PaiementHistoireController;
use App\Http\Controllers\Lecteur\PaiementRecetteController;
use App\Http\Controllers\Lecteur\PaiementTraditionController;
use App\Http\Controllers\Lecteur\CommentaireController;
use App\Http\Controllers\Auteur\ContenuController as AuteurContenuController;


// Routes publiques

Route::get('/culture_benin', [AccueilController::class, 'index'])->name('index');

 Route::get('/culture',function () {
        return view('main');
    });

 Route::get('/culture/contact',function () {
        return view('lecteur.contact');
    })-> name('culturecontact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

        Route::get('/culture/about',function () {
        return view('lecteur.propos');
    })-> name('a_propos');
// Dans routes/web.php
Route::get('/regions', [ReController::class, 'index'])->name('region.index');
Route::get('/regions/{id}', [ReController::class, 'show'])->name('region.show');


// Paiement pour les histoires et contes
// Routes de paiement pour les histoires
Route::any('/paiement/histoire/callback', [PaiementHistoireController::class, 'callback'])->name('paiement.histoire.callback');
Route::get('/paiement/histoire/{id}', [PaiementHistoireController::class, 'initierPaiement'])->name('paiement.histoire.initier');
Route::post('/paiement/histoire/{id}', [PaiementHistoireController::class, 'procesPaiement'])->name('paiement.histoire.process');

Route::get('/paiement/histoire/annulation', [PaiementHistoireController::class, 'annulation'])->name('paiement.histoire.annulation');


// Routes de paiement pour les recettes
Route::any('/paiement/recette/callback', [PaiementRecetteController::class, 'callback'])->name('paiement.recette.callback');
Route::get('/paiement/recette/{id}', [PaiementRecetteController::class, 'initierPaiement'])->name('paiement.recette.initier');
Route::post('/paiement/recette/{id}', [PaiementRecetteController::class, 'procesPaiement'])->name('paiement.recette.process');
Route::get('/paiement/recette/annulation', [PaiementRecetteController::class, 'annulation'])->name('paiement.recette.annulation');
// Routes de paiement pour les traditions
Route::any('/paiement/tradition/callback', [PaiementTraditionController::class, 'callback'])->name('paiement.tradition.callback');
Route::get('/paiement/tradition/{id}', [PaiementTraditionController::class, 'initierPaiement'])->name('paiement.tradition.initier');
Route::post('/paiement/tradition/{id}', [PaiementTraditionController::class, 'procesPaiement'])->name('paiement.tradition.process');
Route::get('/paiement/tradition/annulation', [PaiementTraditionController::class, 'annulation'])->name('paiement.tradition.annulation');


// De même pour les recettes et traditions
// Dans routes/web.php
Route::get('/slangues', [LangController::class, 'index'])->name('langue.index');
Route::get('/langues/{id}', [LangController::class, 'show'])->name('langue.show');
Route::get('/traditions', [TraditionController::class, 'index'])->name('traditions.index');
Route::get('/traditions/{id}', [TraditionController::class, 'show'])->name('traditions.show');
// Dans routes/web.php
Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');
Route::get('/recettes/{id}', [RecetteController::class, 'show'])->name('recettes.show');
// Dans routes/web.php
Route::get('/histoires', [HistoireController::class, 'index'])->name('histoires.index');
Route::get('/histoires/{id}', [HistoireController::class, 'show'])->name('histoires.show');

// Routes pour les commentaires des lecteurs
Route::prefix('lecteur')->middleware(['auth'])->group(function () {
    Route::post('/commentaire/{contenuId}', [CommentaireController::class, 'store'])->name('lecteur.commentaire.store');
    Route::get('/commentaire/{id}/edit', [CommentaireController::class, 'edit'])->name('lecteur.commentaire.edit');
    Route::put('/commentaire/{id}', [CommentaireController::class, 'update'])->name('lecteur.commentaire.update');
    Route::delete('/commentaire/{id}', [CommentaireController::class, 'destroy'])->name('lecteur.commentaire.destroy');
});

// Routes pour les auteurs (publiques)
Route::prefix('auteur')->group(function () {
    // Inscription
    Route::get('/register', [AuteurAuthController::class, 'showRegistrationForm'])->name('auteur.register');
    Route::post('/register', [AuteurAuthController::class, 'register']);
    Route::get('/auteurdashboard', [AuteurDashboardController::class, 'index'])->name('dash');
     
    // Connexion
    Route::get('/login', [AuteurAuthController::class, 'showLoginForm'])->name('auteur.login');
    Route::post('/login', [AuteurAuthController::class, 'login']);

    // Page de confirmation d'inscription
    Route::get('/registration/confirmation', [AuteurAuthController::class, 'showRegistrationConfirmation'])->name('auteur.registration.confirmation');
});
Route::prefix('lecteur')->group(function() {
    // Inscription
    Route::get('/register', [\App\Http\Controllers\Auth\LecteurAuthController::class, 'showRegistrationForm'])->name('lecteur.register');
    Route::post('/register', [\App\Http\Controllers\Auth\LecteurAuthController::class, 'register']);

    // Connexion
    Route::get('/login', [\App\Http\Controllers\Auth\LecteurAuthController::class, 'showLoginForm'])->name('lecteur.login');
    Route::post('/login', [\App\Http\Controllers\Auth\LecteurAuthController::class, 'login']);

    // Déconnexion
    Route::post('/logout', [\App\Http\Controllers\Auth\LecteurAuthController::class, 'logout'])->name('lecteur.logout');

    // Routes du profil (protégées)
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('lecteur.profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('lecteur.profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('lecteur.profile.update');
        Route::get('/profile/commentaires', [ProfileController::class, 'commentaires'])->name('lecteur.profile.commentaires');
    });
});
















// Routes protégées pour les auteurs connectés (AVEC LE PREFIX)
Route::prefix('auteur')->middleware(['auth:auteur'])->group(function () {
    // Dashboard et profil
    Route::get('/dashboard', [AuteurDashboardController::class, 'index'])->name('auteur.dashboard');
    Route::get('/profile', [AuteurDashboardController::class, 'profile'])->name('auteur.profile');
    Route::post('/profile', [AuteurDashboardController::class, 'updateProfile'])->name('auteur.profile.update');
    Route::post('/logout', [AuteurAuthController::class, 'logout'])->name('auteur.logout');
    
    // Gestion des contenus
    Route::prefix('contenu')->group(function () {
        Route::get('/', [AuteurContenuController::class, 'index'])->name('auteur.contenu.index');
        Route::get('/create', [AuteurContenuController::class, 'create'])->name('auteur.contenu.create');
        Route::post('/', [AuteurContenuController::class, 'store'])->name('auteur.contenu.store');
        Route::get('/{id}', [AuteurContenuController::class, 'show'])->name('auteur.contenu.show');
        Route::get('/{id}/edit', [AuteurContenuController::class, 'edit'])->name('auteur.contenu.edit');
        Route::put('/{id}', [AuteurContenuController::class, 'update'])->name('auteur.contenu.update');
        Route::delete('/{id}', [AuteurContenuController::class, 'destroy'])->name('auteur.contenu.destroy');
    });
    

        Route::prefix('media')->group(function () {
        Route::get('/', [AuteurMediaController::class, 'index'])->name('auteur.media.index');
        Route::get('/create', [AuteurMediaController::class, 'create'])->name('auteur.media.create');
        Route::post('/', [AuteurMediaController::class, 'store'])->name('auteur.media.store');
        Route::get('/{id}', [AuteurMediaController::class, 'show'])->name('auteur.media.show');
        Route::delete('/{id}', [AuteurMediaController::class, 'destroy'])->name('auteur.media.destroy');
    });



 
    
});