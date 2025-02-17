    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12" style="padding: 0 auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 0 auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="padding: 0 auto">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                    @if($noticia->imagem)
        <img src="/storage/imagens/{{$noticia->imagem}}" style="width:40%;">
    @endif

    <form action="{{url('noticia/salvar')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="{{$noticia->id}}">
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo', $noticia->titulo)}}">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data" value="{{old('data', $noticia->data->format('Y-m-d')) }}">
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor"  value="{{old('autor', $noticia->autor)}}">
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select" name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option {{ $noticia->categoria == null || $categoria->id != old('categoria_id', $noticia->categoria->id) ? '' : 'selected' }} value='{{$categoria->id}}'>{{$categoria->descricao}}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" class="form-control" id="arquivo" name="arquivo">
        </div>


        <x-primary-button class="ms-3">
            {{ __('Nova noticia') }}
        </x-primary-button>
    </form>
            </div>
        </div>
    </div>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>