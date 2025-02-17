<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoriaController extends Controller
{
    function pdf() {
        $categorias = Categoria::orderBy('descricao')->get();
        $pdf = Pdf::loadView('listagemCategoriaPDF', compact('categorias'));
        return $pdf->download('categorias.pdf');

    }

    function listar() {
        $categorias = Categoria::orderBy('descricao')->get();
        return view('listagemCategoria', compact('categorias'));
    }

    function novo() {
        $categoria = new Categoria();
        $categoria->id = 0;
        $categoria->descricao = "";
        return view('formularioCategoria', compact('categoria'));
    }

    function salvar(CategoriaRequest $request) {
        if ($request->input('id') == 0)  {
            $categoria = new Categoria();
        } else {
            $categoria = Categoria::find($request->input('id'));
        }

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file("arquivo");
            $caminho_arquivo = $arquivo->store('app/public/imagens');
            $vetor_arquivo = explode('/', $caminho_arquivo);

            if ($categoria->imagem != '') {
                Storage::delete('app/public/imagens/'.$categoria->imagem);
            }
            $categoria->imagem = $vetor_arquivo[2];
        }

        $categoria->descricao = $request->input('descricao');
        $categoria->save();
        return redirect('noticia');
    }

    function editar($id) {
        $categoria = Categoria::find($id);
        return view('formularioCategoria', compact('categoria'));
    }

    function apagar($id) {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect('categoria');
    }

}
