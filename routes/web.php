<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [DashboardController::class, 'index'])->name('home.index');

Route::get('/clientes', function () {
    return view('clientes');
})->name('clientes.index');

Route::get('/clientes/create', function () {
    return view('clientes.create');
})->name('clientes.create');

// Rota para armazenar dados do veículo
Route::post('/', [VeiculoController::class, 'store'])->name('veiculos.store');

Route::put('/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
Route::get('/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
Route::delete('/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');