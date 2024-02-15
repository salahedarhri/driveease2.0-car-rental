<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
//Admin
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminReservationController;
//Livewire
use App\Livewire\ValiderReservation;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Pages standards
Route::get('/', function () {   return view('landing'); })->name('accueil');
Route::get('/à_propos', function () {   return view('about'); })->name('apropos');
Route::get('/cars', [ CarController::class, 'index' ])->name('cars');

//Reservation
Route::get('/voituresDisponibles', [ ReservationController::class, 'CheckDisponibilite' ])
    ->name('voituresDisponibles');
Route::post('/protection_&_options', [ ReservationController::class, 'choisirProtection' ])
    ->name('protection_&_options');
Route::get('/resume', ValiderReservation::class )
    ->name('resume');

//Espace Client / Espace Admin (à revoir )
Route::middleware('admin.check')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return view('admin.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//Laravel Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Routing
Route::group(['prefix' => 'admin', 'middleware' => 'admin.check'], function () {
    Route::resource('utilisateurs', AdminUserController::class);
    Route::resource('voitures', AdminCarController::class);
    Route::resource('reservations', AdminReservationController::class);
});

Route::prefix('admin')->group(function () {
    Route::get('utilisateurs', [AdminUserController::class, 'index'])->name('admin.utilisateurs.index');
    Route::get('voitures', [AdminCarController::class, 'index'])->name('admin.voitures.index');
});

require __DIR__ . '/auth.php';


// Route::post('/franchise_refresh', [ReservationController::class, 'actualiserFranchise'])
//     ->name('actualiserFranchise');
// Route::post('/options', [ReservationController::class, 'choisirOptions'])
//     ->name('choisirOptions');
// Route::post('/option_remove', [ReservationController::class, 'retirerOption'])
//     ->name('retirerOption');