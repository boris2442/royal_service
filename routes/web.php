<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/agence', [AgenceController::class, 'index'])->name('agence');
Route::get('/prestations', [PrestationController::class, 'index'])->name('prestation');

Route::inertia('/realisations', 'Realisations')->name('realisations');

// Route Inertia pour la page HTML
Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery.index');

// Route API dédiée pour l'Infinite Scroll & Filtres (Axios)
Route::get('/api/galerie-data', [GalleryController::class, 'fetchPhotos'])->name('api.gallery.data');
Route::inertia('/restaurant', 'Restaurant')->name('restaurant');
Route::inertia('/contact', 'Contact')->name('contact');
Route::inertia('/cgu', 'Cgu')->name('cgu');
Route::inertia('/mentions-legales', 'MentionLegale')->name('mentions-legales');
Route::inertia('/politique-confidentialite', 'PolitiqueDeConfidentialite')->name('politique-confidentialite');



Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::post('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])->name('invitations.decline');
});

require __DIR__ . '/settings.php';
