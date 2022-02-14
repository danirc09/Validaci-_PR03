<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="p-4">
    <form action="{{url('/crearAnimalPost')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <h2>Nombre</h2>
        <input type="text" name="nombre_animal">
        @error('nombre_animal')
            <br>
            {{$message}}
        @enderror
        <h2>Peso</h2>
        <input type="number" name="peso_animal">
        @error('peso_animal')
            <br>
            {{$message}}
        @enderror
        <h2>Número de Serie(4 digitos)</h2>
        <input type="number" name="num_serie">
        @error('num_serie')
            <br>
            {{$message}}
        @enderror
        <br><br>
        <button type="submit" value="Enviar" class="btn btn-success">Crear</button>
    </form>
</body>
</html>