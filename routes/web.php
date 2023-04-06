<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlacesController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/places', [PlacesController::class, 'index'])->name('places.index');
    // Route::get('/places/create', [PlacesController::class, 'create'])->name('places.create');
    // Route::get('/places/show/{id}', [PlacesController::class, 'show'])->name('places.show');
    Route::resource('places', PlacesController::class);
    Route::get('/places/reviews/{id}', [PlacesController::class, 'reviews'])->name('places.reviews');
    Route::post('/reviews/store', [PlacesController::class, 'reviewsStore'])->name('reviews.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
