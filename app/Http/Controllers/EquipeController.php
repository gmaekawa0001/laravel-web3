<?php

namespace App\Http\Controllers;
use App\Models\Equipe;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    function listar(){
        $equipes = Equipe::all();
        return view('listar-equipes', compact('equipes'));
    }

    function novo() {
        $equipe = new Equipe();
        return view('cadastrar-equipe', compact('equipe'));
    }

    function salvar(Request $request){
        // Validar os dados recebidos no formulário
    $request->validate([
        'nome' => 'required|string|max:255',
    ]);

    // Verificar se o 'id' está presente para decidir se é uma atualização ou criação
    if ($request->has('id') && $request->input('id') != 0) {
        // Atualização (caso tenha id, buscamos a equipe)
        $equipe = Equipe::find($request->input('id'));
        if (!$equipe) {
            return redirect()->route('equipes.listar')->with('error', 'Equipe não encontrado.');
        }
    } else {
        // Criação (caso contrário, cria uma nova Equipe)
        $equipe = new Equipe();
    }
        $equipe->nome = $request->input('nome');
        $equipe->save();
        return redirect('/equipes')->with('success', 'Equipe salva com sucesso!');
    }

    function editar($id) {
        $equipe= Equipe::find($id);
        
        return view('cadastrar-equipe', compact('equipe'));
    }

    function apagar($id) {
        $equipe = Equipe::destroy($id);
        return redirect('/equipes')->with('success', 'Equipe deletada com sucesso');

    }
}
