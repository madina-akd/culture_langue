<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

// Routes publiques
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Routes 2FA
Route::get('/twofactor', [LoginController::class, 'showTwoFactorForm'])->name('twofactor.form');
Route::post('/twofactor', [LoginController::class, 'verifyTwoFactor'])->name('twofactor.verify');
Route::get('/twofactor/enable', [TwoFactorController::class, 'enableTwoFactor'])->name('twofactor.enable');
Route::post('/twofactor/verify', [TwoFactorController::class, 'verifyTwoFactor'])->name('twofactor.activate');
Route::post('/twofactor/disable', [TwoFactorController::class, 'disableTwoFactor'])->name('twofactor.disable');

// Routes de réinitialisation de mot de passe
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('admin.password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('admin.password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('admin.password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('admin.password.store');

// Page d'activation 2FA
Route::get('/code/enable', function () {
    return view('admin.enable');
})->middleware('auth');

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');

// Routes protégées pour admin/manager
Route::middleware(['web', 'auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('admin')->group(function(){
        Route::resource('langues', LanguesController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('contenu', ContenuController::class);
        Route::resource('commentaire', CommentaireController::class);
        Route::resource('regions', RegionController::class);
        Route::resource('media', MediaController::class)->parameters(['media' => 'media']);
        Route::resource('typemedia', TypeMediaController::class);
        Route::resource('typecontenu', TypeContenuController::class)->parameters(['typecontenu' => 'typecontenu']);
    });

    Route::resource('utilisateur', UtilisateurController::class);
    Route::post('/utilisateurs/{utilisateur}/valider', [UtilisateurController::class, 'valider'])->name('utilisateurs.valider');
    Route::post('/utilisateurs/{utilisateur}/desapprouver', [UtilisateurController::class, 'desapprouver'])->name('utilisateurs.desapprouver');

    Route::get('/admin/contact', function () {
        return view('admin.contact');
    })->name('contact');

    Route::get('/admin/settings', function () {
        return view('admin.parametre');
    })->name('setting');

    Route::post('/admin/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.updateProfile');
    Route::post('/admin/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.updatePassword');
    Route::post('/admin/settings/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.updatePreferences');
   
    Route::put('password', [PasswordController::class, 'update'])->name('admin.password.update');
});

// Routes pour les auteurs
Route::middleware(['web', 'auth', 'auteur'])->group(function () {
    Route::get('/auteur/dashboard', function () {
        return view('auteur.dashboard');
    })->name('auteur.dashboard');
    
    // Ajoutez ici les routes spécifiques aux auteurs
});