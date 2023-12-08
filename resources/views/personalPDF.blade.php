<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de Personal-Sucursal</h1>
    <h2>Pedidos</h2>
    <table border="1">
     
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curp</th>
                <th>Sucursal</th>
                <th>Número telefónico</th>
                <th>Edad</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($personal as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->curp}}</td>
                        <td>{{$item->cargo}}</td>
                        <td>{{$item->numerotel}}</td>
                        <td>{{$item->edad}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>


</body>
</html>