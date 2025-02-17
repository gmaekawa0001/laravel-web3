<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias') }}
        </h2>
    </x-slot>


    <div class="py-12" style="padding: 0 auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('noticia.novo') }}"><x-primary-button class="ms-3">
                            {{ __('Nova noticia') }}
                        </x-primary-button></form>
                        <form action="{{ route('categoria.novo') }}"><x-primary-button class="ms-3">
                            {{ __('Nova categoria') }}
                        </x-primary-button></form>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Data</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Categoria</th>
                                <th scope="col"></th>

                                <th>Apagar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($noticias as $noticia)
                            <tr>
                                <th scope='row'>{{$noticia->id}}</th>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{$noticia->data->format('d/m/Y')}}</td>
                                <td>{{$noticia->autor}}</td>
                                <td>{{$noticia->categoria->descricao}}</td>
                                <td>
                                    @if($noticia->imagem)
                                    <img src="/public/storage/imagens/{{$noticia->imagem}}" style="width:50px;">
                                    @endif
                                </td>
                                <td>
                                    <a class='btn btn-danger' href='noticia/apagar/{{$noticia->id}}'>x</a>
                                </td>
                                <td>
                                    <a class='btn btn-primary' href='noticia/editar/{{$noticia->id}}'>+</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>