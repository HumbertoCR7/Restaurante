<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de Inventario-Sucursal</h1>
    <h2>Pedidos</h2>
    <div style="text-align: center">
    <table border="1">
     
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Sucursal</th>
                            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->tipo }}</td>
                        <td>{{ $item->pronombre }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->opcion  }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
</body>
</html>