<?php

use App\Http\Controllers\VideojuegoController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/videojuegos/poseo', [VideojuegoController::class, 'poseoIndex'])->name('videojuegos.poseoIndex')->middleware("auth");

Route::post('videojuegos/poseo', [VideojuegoController::class, "poseoCreate"])->name('videojuegos.poseoCreate')->middleware("auth");


Route::resource('videojuegos', VideojuegoController::class)->middleware("auth");

require __DIR__.'/auth.php';
