@extends('app')
@section('content')
    <div class="container">
        


        <h1>PILOTO</h1>
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
                <input type="text" class="form-control" id="numero" name="numero"  value="<?php echo $piloto['numero']; ?>">
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

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection