<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;


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



Route::get('/', [GuestPageController::class, 'home'])->name('guest.home');


Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {


            Route::resource('doctors', DoctorController::class);
            Route::resource('users', UserController::class);
            Route::resource('reviews', ReviewController::class);
            Route::resource('messages', MessageController::class);
            Route::resource('dashboard',DashboardController::class);
            
            // rotta per visualizzare il curriculum
            Route::get('/doctors/{id}/curriculum', [DoctorController::class, 'showCurriculum'])->name('doctors.showCurriculum');

});

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
