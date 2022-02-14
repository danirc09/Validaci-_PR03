<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="js/code.js"></script>
</head>
<body class="p-4">
    <div id="mensaje">

    </div>
    <br>
    <form action="{{url('/crearAnimal')}}" method="GET">
        <button class= "btn btn-success" type="submit" name="Crear" value="Crear">Crear</button>
    </form>
    <br>
    <input type="text" id="leerajaxhtml" placeholder="🔎 Buscar" onkeyup="leerJS()">
    <br>
    <br>
    <div id="content_animal">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Peso</th>
                <th>ID_chip</th>
                <th>Num_serie</th>
                <th>Eliminar</th>
            </tr>
            
            @foreach ($animales as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre_animal}}</td>
                    <td>{{$item->peso_animal}} kg</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->num_serie}}</td>
                    <td>
                        <form action="{{url('/eliminarAnimal/'.$item->id)}}" method="GET">
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    
        </table>
    </div>
    
</body>
</html>