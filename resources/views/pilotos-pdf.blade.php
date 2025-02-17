    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Lista de Pilotos') }}
    </h2>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Piloto</th>
                <th scope="col">Numeração</th>
                <th scope="col">Data nascimento</th>
                <th scope="col">Equipe</th>
              </tr>
            </thead>
            <tbody>

            <tbody>
              @foreach ($pilotos as $piloto)
              <tr>
                <td>{{ $piloto->id }}</td>
                <td>{{ $piloto->nome }}</td>
                <td>{{ $piloto->numero }}</td>
                <td>{{ $piloto->data_nasc }}</td>
                <td>{{ $piloto->equipe->nome }}</td>
            </tr>
              @endforeach
            </tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"