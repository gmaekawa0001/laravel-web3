<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de categoria') }}
        </h2>
    </x-slot>

    <div class="py-12" style="padding: 0 auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($categoria->imagem)
                    <img src="/storage/imagens/{{$categoria->imagem}}" style="width:200px;">
                    @endif

                    <form action="{{url('categoria/salvar')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input readonly type="text" class="form-control" id="id" name="id" value="{{$categoria->id}}">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{old('descricao', $categoria->descricao)}}">
                            @error('descricao')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="arquivo" class="form-label">Arquivo</label>
                            <input type="file" class="form-control" id="arquivo" name="arquivo">
                        </div>
                        <x-primary-button class="ms-3">
                            {{ __('Salvar') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>