<?php

use App\Models\Category;
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


Route::group(['middleware' => ['auth', 'company_registration_completed']], function () {
    Route::get('/dashboard', function () {
        $categorias = Category::all();
        return view('dashboard', ['categorias' => $categorias]);
    })->name('dashboard');

    Route::resource('/denuncia', DenunciaController::class);
    Route::resource('/reclamante', ComplainantController::class);
    Route::delete('/denuncia/{id}', [DenunciaController::class, 'destroy'])->name('excluir_denuncia');
    Route::get('/denuncia2', [DenunciaController::class, 'all'])->name('denuncia_all');
    Route::get('/myDenuncia', [DenunciaController::class, 'my'])->name('denuncia_my');
    Route::get('/forModal/{id}', [DenunciaController::class, 'forModal'])->name('denuncia_forModal');
});


require __DIR__ . '/auth.php';
