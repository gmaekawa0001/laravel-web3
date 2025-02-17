<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de nova equipe') }}
        </h2>
    </x-slot>
    <style>
        [type-text]{
            background: rgb(17 24 39 / var(--tw-bg-opacity, 1));
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--  -->

                    <form action="{{route('piloto.salvar')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @if (isset($piloto->id))
                            <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $piloto['id']; ?>">
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $piloto['nome']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="data_nasc" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?php echo $piloto['data_nasc']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numero</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $piloto['numero']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="equipe_id" class="form-label">Equipe</label>
                            <select class="form-select" name="equipe_id" id="equipe_id">
                                @foreach($equipes as $equipe)
                                $selected = "";
                                @if ($equipe->id == $piloto->equipe_id)
                                $selected = "selected";
                                @else

                                <option $selected value={{$equipe->id}}>{{$equipe->nome}}</option>";
                                @endif
                                @endforeach

                            </select>
                        </div>

                        <div>
                            <x-primary-button class="ms-3">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"