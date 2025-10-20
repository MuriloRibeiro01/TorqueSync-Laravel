<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;

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

// Dashboard (rota principal)
Route::get('/', [DashboardController::class, 'index'])->name('home.index');

// ROTAS DE CLIENTES
Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});

// ROTAS DE VEÍCULOS
// Rota para armazenar dados do veículo
Route::prefix('/veiculos')->group(function () {
    Route::post('/', [VeiculoController::class, 'store'])->name('veiculos.store');
    Route::put('/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
    Route::get('/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
    Route::delete('/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
});