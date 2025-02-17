<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Item;
use App\Models\Produto;

class VendaController extends Controller
{
    function listar() {
        $vendas = Venda::all();
        return view('listagemVenda', compact('vendas'));
    }

    function novo() {
        $venda = new Venda();
        $venda->id = 0;
        $venda->valor = 0;
        $venda->data = now();
        return view('formularioVenda', compact('venda'));
    }

    function salvar(Request $request) {
        $id = $request->input('id');
        if ($id != 0) {
            $venda = Venda::find($id);
        }else {
            $venda = new Venda();
        }
        $venda->data = $request->input('data');
        $venda->cliente = $request->input('cliente');
        $venda->documento = $request->input('documento');
        $venda->valor = $request->input('valor');
        $venda->save();
        if ($id==0) {
            return redirect('venda/item/'.$venda->id);
        } else {
            return redirect('venda');
        }
    }

    function item($id) {
        $venda = Venda::find($id);
        $item = new Item();
        $produtos = Produto::all();
        return view('itensVenda', compact('venda', 'item', 'produtos'));
    }

    function salvar_item(Request $request) {
        $id = $request->input('id');
        $item = new Item();
        $item->venda_id = $request->input('venda_id');
        $item->produto_id = $request->input('produto_id');
        $produto = Produto::find($item->produto_id);
        $item->valor_unitario = $produto->valor;
        $item->quantidade =$request->input('quantidade');
        $item->valor_total = $item->valor_unitario * $item->quantidade;
        $item->save();

        $venda = Venda::find($item->venda_id);
        $venda->valor = $venda->valor + $item->valor_total;
        $venda->save();

        return redirect('venda/item/'.$item->venda_id);
    }

    function excluir_item($id) {
        $item = Item::find($id);
        $venda = Venda::find($item->venda_id);
        $venda->valor = $venda->valor - $item->valor_total;
        $item->delete();
        $venda->save();
        return redirect('venda/item/'.$venda->id);

    }

    function apagar($id) {
        $venda = Venda::find($id);
        $venda->delete();
        // os itens dessa venda serão apagados em cascata pelo banco de dados
        return redirect('venda');

    }

    function editar($id) {
        $venda = Venda::find($id);
        return view('formularioVenda', compact('venda'));
    }
}
