<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de nova equipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('equipe.salvar')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @if (isset($equipe->id))
                            <input readonly type="text" class="form-control" id="id" name="id" value="{{$equipe->id}}">
                            @endif

                            <div class="mt-4">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" value="{{$equipe->nome}}" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <x-primary-button class="ms-3">
                                    {{ __('Salvar') }}
                                </x-primary-button>
                            </div>
                    </form>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"