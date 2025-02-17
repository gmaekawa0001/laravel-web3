<x-app-layout>
<style>
        td{
            text-align: center;
        }
    </style>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Lista de Usuarios') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">       
        
            <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Mensagem</th>
              </tr>
            </thead>
            <tbody>

                @foreach($usuarios as $usuario)
                    <tr>
                      <th scope='row'>{{$usuario->id}}</th>
                      <td>{{$usuario->name}}</td>
                      <td>{{$usuario->email}}</td>
                      <td><a href="/usuario/mensagem/{{$usuario->id}}" class="btn btn-primary">Mensagem</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"

        
 