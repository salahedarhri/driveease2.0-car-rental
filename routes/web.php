<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

//Livewire
use App\Livewire\ValiderReservation;
use App\Livewire\VoituresDisponibles;
use App\Livewire\ChoisirOptionsEtFranchise;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\CarsManagement;
use App\Livewire\Admin\ModifierVoiture;
use App\Livewire\Admin\NewslettersManagement;
use App\Livewire\Admin\LieuxManagement;
use App\Livewire\Admin\ModifierLieu;

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
Route::get('/', function () { return view('landing');})->name('accueil');
Route::get('/apropos', function () { return view('about');})->name('apropos');
Route::get('/voitures', [ CarController::class, 'index'])->name('cars');

//Reservation
Route::get('/email_envoye', [ReservationController::class, 'renduEmail'])->name('email');
Route::get('/voituresDisponibles/{dateDepart}/{dateRetour}/{lieuDepart}/{lieuRetour}/{minAge}', VoituresDisponibles::class )->name('VoituresDisponibles');
Route::get('/protectionEtOptions/{dateDepart}/{dateRetour}/{lieuDepart}/{lieuRetour}/{minAge}/{voiture}', ChoisirOptionsEtFranchise::class )->name('Protection&Options');
Route::get('/resumeReservation/{dateDepart}/{dateRetour}/{lieuDepart}/{lieuRetour}/{minAge}/{voiture}', ValiderReservation::class )->name('finaliserReservation');

//Checkout
Route::post('/checkout/{dateDepart}/{dateRetour}/{voiture}', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
Route::post('/webhook', [PaymentController::class, 'webhook'])->name('webhook');

//Laravel Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Espace Client / Espace Admin 
Route::get('/dashboard', [Controller::class,'dashboard'])->middleware(['auth','verified'])->name('dashboard');

Route::group(['prefix'=>'admin','middleware'=>['admincheck']],  function(){
    Route::get('dashboard', AdminDashboard::class)->name('adminPanel');
    //Voitures
    Route::get('voitures', CarsManagement::class)->name('adminCars');
    Route::get('voiture/{id}', ModifierVoiture::class )->name('manageCar');
    //Newsletter
    Route::get('newsletters', NewslettersManagement::class)->name('adminNewsletters');
    //Lieux
    Route::get('lieux', LieuxManagement::class)->name('adminLieux');
    Route::get('lieu/{id}', ModifierLieu::class )->name('manageLieu');
});

require __DIR__ . '/auth.php';
