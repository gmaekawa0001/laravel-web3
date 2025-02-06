@extends('app')
@section('content')
    <div class="container">
       

        <h1>Equipe</h1>
        <form action="{{route('equipe.salvar')}}" method="POST">
            @csrf
            <div class="mb-3">
            @if (isset($equipe->id))
                <input readonly type="text" class="form-control" id="id" name="id" value="{{$equipe->id}}">
            @endif
            <div class="mb-3">
                <label for="descricao" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$equipe->nome}}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection