<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de Pedidos-Menu</h1>
    <h2>Pedidos</h2>
    <table border="1">
     
        <thead>
            <tr>
                <th>Nombre Cliente</th>
                <th>Nombre Platillo</th>
                <th>Precio</th>
                <th>Número de Mesa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $item)
                    <tr>
                        <td>{{ $item->nomcliente }}</td>
                        <td>{{ $item->nomplatillo  }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->nummesa }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>


</body>
</html>