<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);

Route::post('/saveReservation', [\App\Http\Controllers\MainController::class, 'saveReservation'])->name(
    'saveReservation'
);
Route::get(
    '/removeReservation/{id}/{index}',
    [\App\Http\Controllers\MainController::class, 'removeReservation']
)->name(
    'removeReservation'
);
