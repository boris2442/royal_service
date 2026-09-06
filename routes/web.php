<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
// use App\Http\Controllers\PrestationController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Inertia\Inertia;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/agence', [AgenceController::class, 'index'])->name('agence');
// Route::get('/prestations', [PrestationController::class, 'index'])->name('prestation');
Route::inertia('/prestations', 'Prestation');

Route::inertia('/realisations', 'Realisations')->name('realisations');


Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery.index');


Route::get('/api/galerie-data', [GalleryController::class, 'fetchPhotos'])->name('api.gallery.data');
Route::inertia('/restaurant', 'Restaurant')->name('restaurant');
Route::inertia('/contact', 'Contact')->name('contact');
Route::inertia('/cgu', 'Cgu')->name('cgu');
Route::inertia('/mentions-legales', 'MentionLegale')->name('mentions-legales');
Route::inertia('/politique-confidentialite', 'PolitiqueDeConfidentialite')->name('politique-confidentialite');

// Route spécifique pour la location de chaises et bâches
Route::inertia('/location-chaises-baches', 'Prestations/LocationBachesChaises')->name('chaises-baches');
Route::inertia('/decoration-scenographie', 'Prestations/DecorationAndScenographie')->name('decoration-scenographie');
Route::inertia('/service-traiteur-cuisiniers', 'Prestations/ServiceTraiteurAndKitchen')->name('service-traiteur-cuisiniers');
Route::inertia('/green-space', 'Prestations/GreenSpace')->name('green-space');
Route::inertia('/hotesses-serveurs', 'Prestations/HotesseServeur')->name('hotesses-serveurs');
Route::inertia('/maitre-ceremonie', 'Prestations/MaitreCeremonie')->name('maitre-ceremonie');
Route::inertia('/sonnorisation', 'Prestations/Sonorisation')->name('sonorisation');
Route::inertia('/organisation-evenements', 'Prestations/Organisation')->name('organisation-evenements');

Route::inertia('/bar-a-cocktails', 'Prestations/BarACocktails')->name('bar-a-cocktails');


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
