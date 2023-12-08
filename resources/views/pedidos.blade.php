@extends('layout')

@section('contenido')
    <br>
    <h1>Pedidos</h1>
    <section class="class row">
        <section class="class col-11"> <a class="nav-link" href="{{ route('pedidos.create') }}">
     <button type="button" class="btn btn-warning">Realizar pedido</button></a></section>
        <section class="class col-1"><a  class="btn btn-secondary" href="{{ route('pedidosPDF.pdf') }}">Imprimir</a></section>
    </section>
    <div class="table-responsive">
       <section class="container">
        <table class="table table-bordered table  table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nom. clien.</th>
                    <th scope="col">Nom. plati. </th>
                    <th scope="col">Precio</th>
                    <th scope="col">No. mesa</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $item)
                    <tr>
                        <td>{{ $item->nomcliente }}</td>
                        <td>{{ $item->nomplatillo }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->nummesa }}</td>
                        <td>
                            <section class="row">
                                <section class="col">
                            <a href="{{route("pedidos.edit", $item->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" >Actualizar</a>
                            
                        </section><section class="col">
                            <form action="{{route("pedidos.destroy",$item->id)}}" method="POST">
                  
                              @csrf
                              @method('DELETE')
                          <button type="submit" class="btn btn-danger"> Eliminar</button>
                            </form>
                        </section></section>
                        </td>
                         <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Editar pedido</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route("pedidos.update", $item->id)}}">
                        @csrf
                        @method('PUT')
                        <section class="container"> 
                            <div class="form-row">
                                <div class="row">
                                    <label for="inputCity">Nombre del cliente</label>
                                    <input type="text" class="form-control" id="nomcliente" name="nomcliente" value="{{$item->nomcliente}}"  required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="18">
                                </div>
                                <br><br>
                                <div class="row">
                                    <label for="inputCity">Nombre del platillo</label>
                                    <input type="text" class="form-control" id="nomplatillo" name="nomplatillo" value="{{$item->nomplatillo}}" readonly>
                                </div>
                                <div class="row">
                                    <label for="inputCity">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" value="{{$item->precio}}" required  pattern="^[0-9]+$" minlength="2" maxlength="4">
                                </div>
                                <div class="row">
                                    <label for="inputCity">Numero de mesa</label>
                                    <input type="text" class="form-control" id="nummesa" name="nummesa" value="{{$item->nummesa}}" required  pattern="^[0-9]+$" minlength="1" maxlength="2">
                                </div>
                            </div>
                        </section>
                    
                    <section>
                        <section class="row">
                            <section class="col-4"><br>
                                <button type="submit" class="btn btn-warning">Actualizar</button>
            
                            </section>
                            <section class="col-4"><br>
                            
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </section>
                        
                        </section>
                    </section>
                </form>
                </div>
            </div>
        </div>
    </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    </div>
@endsection