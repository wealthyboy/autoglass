<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Appointments\AppointmentsController;
use App\Http\Controllers\Api\Years\YearsController;
use App\Http\Controllers\Pages\PagesController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
   return  view('index');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/book-appointment', AppointmentsController::class);
Route::post('/appointment/store',  [AppointmentsController::class, 'store']);

Route::get('/api/years', [YearsController::class, 'index']);
Route::get('/make-model-year',  [AppointmentsController::class, 'makeModelYearSearch']);
Route::post('/api/save-selection', [AppointmentsController::class, 'saveSelection']);
Route::post('/set-category', [AppointmentsController::class, 'setCategory']);
Route::get('pages/{page}', [PagesController::class, 'index']);







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
