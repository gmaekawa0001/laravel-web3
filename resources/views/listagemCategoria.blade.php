@if (isset($mensagem))
<div class='alert alert-primary'>nova mensagem: {{$mensagem}}</div>
@endif

<!-- <h1>Categorias</h1> -->


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Lista de Noticias') }}
    </h2>
  </x-slot>
  <div class="py-12" style="padding: 0 auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 0 auto">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="padding: 0 auto">
        <div class="p-6 text-gray-900 dark:text-gray-100"></div>
        <x-button {{route('categoria.novo')}}>Nova Noticia</x-button>
      </div>
      <a href="categoria/novo" class="btn btn-primary">Nova Categoria</a>
      <a href="categoria/pdf" class="btn btn-primary">Listagem</a>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            <th>Apagar</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>

          @foreach($categorias as $categoria)
          <tr>
            <th scope='row'>{{$categoria->id}}</th>
            <td>{{$categoria->descricao}}</td>
            <td>
              @if($categoria->imagem)
              <img src="storage/app/public/imagens/{{$categoria->imagem}}" style="width:50px;">
              @endif
            </td>
            <td>
              <a class='btn btn-danger' href='categoria/apagar/{{$categoria->id}}'>x</a>
            </td>
            <td>
              <a class='btn btn-primary' href='categoria/editar/{{$categoria->id}}'>+</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>