<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/criar-denuncia', function () {
    return view('denuncia.create');
})->middleware(['auth'])->name('denunciar');

Route::resource('/denuncia', DenunciaController::class);

Route::get('/show', function () {
    return view('denuncia.show');
})->middleware(['auth'])->name('show_denuncia');


Route::post('/denuncia/create' , [DenunciaController::class, 'store'])->middleware(['auth'])->name('criar_denuncia');
Route::get('/denuncia/{denuncia}', [DenunciaController::class, 'show'])->middleware(['auth'])->name('ver_denuncia');
require __DIR__.'/auth.php';
