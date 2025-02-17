<x-app-layout data-bs-theme="dark">
    <x-slot name="header" data-bs-theme="dark">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" data-bs-theme="dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12" style="padding: 0 auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 0 auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="padding: 0 auto">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Data</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Categoria</th>
                                <th scope="col"></th>
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
                                    <img src="/storage/imagens/{{$noticia->imagem}}" style="width:50px;">
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>