<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
//Admin
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminReservationController;
//Livewire
use App\Livewire\ValiderReservation;
use App\Livewire\VoituresDisponibles;
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
Route::get('/', function () {
    return view('landing');
})->name('accueil');

Route::get('/apropos', function () {
    return view('about');
})->name('apropos');
Route::get('/voitures', [CarController::class, 'index'])->name('cars');

//Reservation
Route::get('/voituresDispo', [ReservationController::class, 'CheckDisponibilite'])
    ->name('voituresDispo');
Route::post('/protection_&_options', [ReservationController::class, 'choisirProtection'])
    ->name('protection_&_options');
Route::get('/email_envoye', [ReservationController::class, 'renduEmail'])
    ->name('email');
Route::get('/resume', ValiderReservation::class)->name('resume');

Route::get('/voituresDisponibles/{dateDepart}/{dateRetour}/{lieuDepart}/{lieuRetour}/{minAge}', VoituresDisponibles::class )->name('VoituresDisponibles');

//Checkout
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
Route::post('/webhook', [PaymentController::class, 'webhook'])->name('webhook');

//Espace Client / Espace Admin 
Route::middleware('admincheck')->group(function () {
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
Route::group(['prefix' => 'admin', 'middleware' => 'admincheck'], function () {
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