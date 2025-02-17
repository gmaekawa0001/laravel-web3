<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NoticiaController::class, 'dashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('app');
    });
    
    Route::get('/index', function () {
        return view('index');
    });
    
    Route::get('/pilotos', [PilotoController::class, 'listar'])->name('piloto.listar');
    Route::get('/equipes', [EquipeController::class, 'listar'])->name('equipe.listar');
    Route::get('/novo-piloto', [PilotoController::class, 'novo'])->name('piloto.novo');
    Route::get('/pilotos/pdf', [PilotoController::class, 'pdf'])->name('piloto.pdf');
    Route::post('piloto/salvar', [PilotoController::class, 'salvar'])->name('piloto.salvar');
    Route::get('pilotos/{id}/apagar', [PilotoController::class, 'apagar'])->name('piloto.apagar');
    Route::get('pilotos/{id}/editar', [PilotoController::class, 'editar'])->name('piloto.editar');
    Route::get('equipes/{id}/apagar', [EquipeController::class, 'apagar'])->name('equipe.apagar');
    Route::get('equipes/{id}/editar', [EquipeController::class, 'editar'])->name('equipe.editar');
    Route::get('/nova-equipe', [EquipeController::class, 'novo'])->name('equipe.novo');
    Route::post('equipe/salvar', [EquipeController::class, 'salvar'])->name('equipe.salvar');
});

Route::get('/categoria', [CategoriaController::class, 'listar'])->name('categoria.listar');
    Route::get('/categoria/novo', [CategoriaController::class, 'novo'])->name('categoria.novo');
    Route::post('/categoria/salvar', [CategoriaController::class, 'salvar'])->name('categoria.salvar');
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar'])->name('categoria.editar');
    Route::get('/categoria/apagar/{id}', [CategoriaController::class, 'apagar'])->name('categoria.apagar');
    Route::get('/categoria/pdf', [CategoriaController::class, 'pdf'])->name('categoria.pdf');

    Route::get('/noticia', [NoticiaController::class, 'listar'])->name('noticia.listar');
    Route::get('/noticia/novo', [NoticiaController::class, 'novo'])->name('noticia.novo');
    Route::post('/noticia/salvar', [NoticiaController::class, 'salvar'])->name('noticia.salvar');
    Route::get('/noticia/editar/{id}', [NoticiaController::class, 'editar'])->name('noticia.editar');
    Route::get('/noticia/apagar/{id}', [NoticiaController::class, 'apagar'])->name('noticia.apagar');

    Route::get('/usuario', [UserController::class, 'listar'])->name('usuario.listar');
    Route::get('/usuario/mensagem/{id}', [UserController::class, 'mensagem'])->name('usuario.mensagem');
    Route::post('/usuario/sendMail', [UserController::class, 'sendMail'])->name('usuario.sendMail');

    Route::get('/venda', [VendaController::class, 'listar'])->name('venda.listar');
    Route::get('/venda/novo', [VendaController::class, 'novo'])->name('venda.novo');
    Route::post('/venda/salvar', [VendaController::class, 'salvar'])->name('venda.salvar');
    Route::get('/venda/apagar/{id}', [VendaController::class, 'apagar'])->name('vendar.apagar');
    Route::get('/venda/editar/{id}', [VendaController::class, 'editar'])->name('venda.editar');
    Route::get('/venda/item/{id}', [VendaController::class, 'item'])->name('venda.item');
    Route::post('/venda/salvar_item', [VendaController::class, 'salvar_item'])->name('venda.salvar.item');
    Route::get('/venda/item/excluir/{id}', [VendaController::class, 'excluir_item'])->name('venda.item.excluir');

require __DIR__.'/auth.php';
