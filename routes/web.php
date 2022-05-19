<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesionController;
use App\Models\Sesion;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::resource('session', SesionController::class);

Route::get('session', [SesionController::class, 'index'])
    ->name('session.index');
Route::get('session/training{id}', [SesionController::class, 'indexSessionTrainer'])
    ->name('session.training');
Route::post('session', [SesionController::class, 'store'])
    ->name('session.store');
Route::post('session/training', [SesionController::class, 'updateSession'])
    ->name('session.update');
Route::delete('session/{sesion}', [SesionController::class, 'destroy'])
    ->name('session.destroy');

