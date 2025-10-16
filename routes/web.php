<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;

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

// Rotas para veículos
Route::get('/', [VeiculoController::class, 'index'])->name('home.index');

Route::get('/clientes', function () {
    return view('clientes');
})->name('clientes.index');

Route::get('/clientes/create', function () {
    return view('clientes.create');
})->name('clientes.create');

// Rota para armazenar dados do veículo
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');

Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');