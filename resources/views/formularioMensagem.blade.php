    <x-app-layout>
        <style>
            td {
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
                        <h1>Mensagem para Usuário: {{$usuario->name}} ({{$usuario->email}})</h1>

                        <form action="{{url('usuario/sendMail')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="id" value='{{$usuario->id}}'>
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea name="mensagem" class="form-control" style="height: 10rem;width: 100%"></textarea>
                            </div>
                            <x-primary-button type="submit" class="btn btn-primary">Enviar</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"