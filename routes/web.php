<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AluguelController;

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
Route::prefix('/veiculos')->group(function () {
    Route::post('/', [VeiculoController::class, 'store'])->name('veiculos.store');
    Route::put('/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
    Route::get('/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
    Route::delete('/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
    Route::post('/{veiculo}/manutencao', [VeiculoController::class, 'mandarManutencao'])->name('veiculos.mandarManutencao');
});

// ROTAS DE ALUGUÉIS
Route::prefix('/alugueis')->group(function () {
    Route::post('/', [AluguelController::class, 'store'])->name('aluguel.store');
    Route::get('/{aluguel}', [AluguelController::class, 'show'])->name('aluguel.show');
    Route::put('/{aluguel}', [AluguelController::class, 'devolverLocacao'])->name('aluguel.devolver');
});