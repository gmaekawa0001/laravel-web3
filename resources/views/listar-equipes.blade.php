@extends('app')
@section('content')
<div class="container">

  <h1>Equipes</h1>
  <a href="/nova-equipe" class="btn btn-primary my-3">Nova Equipe</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Descrição</th>
        <th>Apagar</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($equipes as $equipe)
      <tr>
      <th scope='row'>{{$equipe->id}}</th>
      <td>{{$equipe->nome}}</td>
      <td style="text-align: center;
    vertical-align: middle;">
        <a class='btn btn-danger' href="{{ route('equipe.apagar', $equipe->id) }}">x</a>
      </td>
      <td style="text-align: center;
      vertical-align: middle;">
        <a class='btn btn-primary' href="{{ route('equipe.editar', $equipe->id) }}">+</a>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection