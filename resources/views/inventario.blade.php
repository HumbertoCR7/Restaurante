@extends('layout')

@section('contenido')
    <br>
    <h1>Inventario</h1>
    <br>
    <section class="class row">
        <section class="class col-11"><a class="nav-link" href="{{ route('inventario.create') }}"><button type="button" class="btn btn-warning">Agregar producto</button></a></section>
        <section class="class col-1"><a  class="btn btn-secondary" href="{{ route('inventarioPDF.pdf') }}">Imprimir</a></section>
    </section>
  
    </a>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Nom. prod.</th>
                    <th>Cantidad</th>
                    <th>Sucursal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventario as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->tipo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->opcion }}</td>
                        <td>
                            <section class="row">
                                <section class="col">
                            <a href="{{route("inventario.edit", $item->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" >Actualizar</a>
                        </section><section class="col">
                            <form action="{{route("inventario.destroy",$item->id)}}" method="POST">
                  
                              @csrf
                              @method('DELETE')
                          <button type="submit" class="btn btn-danger"> Eliminar</button>
                            </form> </section></section>
                        </td>
                            <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Actualizar Producto</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{route("inventario.update", $item->id)}}">
                    @csrf
                    @method('PUT')
                    <section class="container"> 
                        <div class="form-row">
                      <div class="row">
                        <div class="col">
                            <label for="inputCity">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" value="{{$item->codigo}}" readonly>
                        </div>
                        <div class="col">
                            <label for="inputCity">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="{{$item->tipo}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <br>
                            <label for="inputCity">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}"  required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
                        </div>
                        <div class="col">
                            <br>
                            <label for="inputCity">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{$item->cantidad}}"  required  pattern="^[0-9]+$" minlength="1" maxlength="4">
                        </div>
                    </div>
                </div>
                </section>
                    <section>
                        <section class="row">
                            <section class="col-4"><br>
                                <button type="submit" class="btn btn-warning">Modificar</button>
            
                            </section>
                            <section class="col-3"><br>
                            
                                <a class="nav-link btn btn-danger " type="button" href="{{ route('inventario') }}">
                                    Cancelar
                                 </a>
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
    </div>
@endsection