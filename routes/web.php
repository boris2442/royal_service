<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/agence', [AgenceController::class, 'index'])->name('agence');
Route::get('/prestations', [PrestationController::class, 'index'])->name('prestation');

Route::inertia('/realisations', 'Realisations')->name('realisations');
Route::inertia('/galerie', 'Galerie')->name('galerie');
Route::inertia('/restaurant', 'Restaurant')->name('restaurant');
Route::inertia('/contact', 'Contact')->name('contact');


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
