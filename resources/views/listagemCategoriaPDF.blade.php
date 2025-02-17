<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        width: 100%;
        padding: 2rem;
      }
      h1 {
        text-align: center;
        font-size: 3rem;
      }
      table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
      }
      td, th {
        border: 1px solid black;
        padding: 0.25rem;
        font-size: 1.5rem;
      }
    </style>
</head>
<body>
    <h1>Categorias</h1>
    <table>
        <thead>
            <tr>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <th>{{$categoria->id}}</th>
                    <td>{{$categoria->descricao}}</td>
                    <td>
                    @if($categoria->imagem)
                        <img src="{{ storage_path('app/public/imagens/'.$categoria->imagem)}}" style="width:50px;">
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
</body>
</html>
