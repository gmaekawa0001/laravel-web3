<?php

namespace App\Http\Controllers;
use App\Models\Piloto;
use App\Models\Equipe;

use Illuminate\Http\Request;

class PilotoController extends Controller
{
    function listar(){
        $pilotos = Piloto::all();
        return view('listar-pilotos', compact('pilotos'));
    }

    function novo() {
        $piloto = new Piloto();
        $equipes = Equipe::all();
        return view('cadastrar-piloto', compact('equipes', 'piloto'));
    }

    public function salvar(Request $request)
{
    // Validar os dados recebidos no formulário
    $request->validate([
        'nome' => 'required|string|max:255',
        'numero' => 'required|integer',
        'data_nasc' => 'required|date',
        'equipe_id' => 'required|exists:equipe,id',
    ]);

    // Verificar se o 'id' está presente para decidir se é uma atualização ou criação
    if ($request->has('id') && $request->input('id') != 0) {
        // Atualização (caso tenha id, buscamos o piloto)
        $piloto = Piloto::find($request->input('id'));
        if (!$piloto) {
            return redirect()->route('pilotos.listar')->with('error', 'Piloto não encontrado.');
        }
    } else {
        // Criação (caso contrário, cria um novo piloto)
        $piloto = new Piloto();
    }

    // Preencher os dados do piloto
    $piloto->nome = $request->input('nome');
    $piloto->numero = $request->input('numero');
    $piloto->data_nasc = $request->input('data_nasc');
    $piloto->equipe_id = $request->input('equipe_id');

    // O 'id' não precisa ser definido, pois o banco vai gerar o id autoincrementado

    // Salvar os dados (se for novo, cria; se for existente, atualiza)
    $piloto->save();

    // Redirecionar para a lista de pilotos com uma mensagem de sucesso
    return redirect('/pilotos')->with('success', 'Piloto salvo com sucesso!');
}

    function apagar($id) {
        $piloto = Piloto::destroy($id);
        return redirect('/pilotos')->with('success', 'Piloto deletado com sucesso');

    }

    function editar($id) {
        $piloto = Piloto::find($id);
        $equipes = Equipe::all();
        
        return view('cadastrar-piloto', compact('equipes', 'piloto'));
    }
}
