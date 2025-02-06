@extends('app')
@section('content')
<div class="container">
  @foreach (['success', 'error', 'warning', 'info'] as $msg)
    @if (session($msg))
    <div class="alert alert-{{ $msg }}">
    {{ session($msg) }}
    </div>
  @endif
  @endforeach

  <h1>Pilotos</h1>
  <a href="novo-piloto" class="btn btn-primary my-3">Novo piloto</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Piloto</th>
        <th scope="col">Numeração</th>
        <th scope="col">Data nascimento</th>
        <th scope="col">Equipe</th>
        <th>Apagar</th>
        <th>Editar</th>
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
      <td class="mx-auto">
        <a class='btn btn-danger' href="{{ route('piloto.apagar', $piloto->id) }}">x</a>
      </td>
      <td class="mx-auto">
        <a class='btn btn-primary' href="{{ route('piloto.editar', $piloto->id) }}">+</a>
      </td>
      </tr>
    @endforeach
    </tbody>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection