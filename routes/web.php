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

Route::get('/home', function () {
    return view('home');
})->name('home.index');

Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');

Route::get('/veiculos/create', function () {
    return view('veiculos.create');
})->name('veiculos.create');

Route::get('/clientes', function () {
    return view('clientes');
})->name('clientes.index');

Route::get('/clientes/create', function () {
    return view('clientes.create');
})->name('clientes.create');

// Rota para armazenar dados do veículo
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');