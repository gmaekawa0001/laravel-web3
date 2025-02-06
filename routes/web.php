<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\EquipeController;

Route::get('/', function () {
    return view('app');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/pilotos', [PilotoController::class, 'listar'])->name('piloto.listar');
Route::get('/equipes', [EquipeController::class, 'listar'])->name('equipe.listar');
Route::get('/novo-piloto', [PilotoController::class, 'novo']);
Route::post('piloto/salvar', [PilotoController::class, 'salvar'])->name('piloto.salvar');
Route::get('pilotos/{id}/apagar', [PilotoController::class, 'apagar'])->name('piloto.apagar');
Route::get('pilotos/{id}/editar', [PilotoController::class, 'editar'])->name('piloto.editar');
Route::get('equipes/{id}/apagar', [EquipeController::class, 'apagar'])->name('equipe.apagar');
Route::get('equipes/{id}/editar', [EquipeController::class, 'editar'])->name('equipe.editar');
Route::get('/nova-equipe', [EquipeController::class, 'novo']);
Route::post('equipe/salvar', [EquipeController::class, 'salvar'])->name('equipe.salvar');