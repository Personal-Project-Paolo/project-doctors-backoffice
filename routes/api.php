<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SpecializationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('doctors', [DoctorController::class, 'index'])->name('api.doctors.index');
Route::get('doctors/{doctor}', [DoctorController::class, 'show'])->name('api.doctors.show');

Route::get('users', [UserController::class, 'index'])->name('api.users.index');
Route::get('users/{user}', [UserController::class, 'show'])->name('api.users.show');

Route::get('specializations', [SpecializationController::class, 'index'])->name('api.specializations.index');

Route::get('messages', [MessageController::class, 'index'])->name('api.messages.index');

Route::get('reviews', [ReviewController::class, 'index'])->name('api.reviews.index');


// Qui sotto route da sistemare per mail trap
Route::post('messages/', [MessageController::class, 'store'])->name('api.messages.store');

// Route::post('leads', [LeadController::class, 'store'])->name('api.leads.store');
