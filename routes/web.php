<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\ComplainantController;


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


Route::resource('/denuncia', DenunciaController::class);
Route::resource('/reclamante', ComplainantController::class);
Route::delete('/denuncia/{id}', [DenunciaController::class, 'destroy'])->name('excluir_denuncia');

require __DIR__.'/auth.php';
