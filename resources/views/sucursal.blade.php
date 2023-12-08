@extends('layout')

@section('contenido')
    <br>
    <h1>Sucursales</h1>
    <br>
    <a class="nav-link" href="{{ route('sucursal.create') }}">
        <h4><button type="button" class="btn btn-warning">Agregar nueva sucursal</button></h4>
    </a>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Nom. Sucur.</th>
                    <th>Correo Respon.</th>
                    <th>Nom. Respon.</th>
                    <th>Ape. Respon.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->responsable }}</td>
                        <td>{{ $item->nomtrabajador }}</td>
                        <td>{{ $item->apetrabajador }}</td>
                        <td>
                            <section class="row">
                                <section class="col-6">
                            <a href="{{route("sucursal.edit", $item->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" >Actualizar</a>
                            
                        </section><section class="col-4">
                            <form action="{{route("sucursal.destroy", $item->id)}}" method="POST">
                  
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
                    <h1 class="modal-title" id="exampleModalLabel">Actualizar Sucursal</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route("sucursal.update", $item->id)}}">
                        @csrf
                        @method('PUT')
                        <section class="container"> 
                    <div class="form-row">
                        <div class="col">
                            <label for="inputCity">Nom. Sucur.</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" readonly>
                        </div>
                        <div class="col">
                            <label for="inputCity">Correo Respon.</label>
                            <input type="text" class="form-control" id="responsable" name="responsable" value="{{$item->responsable}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <br>
                            <label for="inputCity">Nom. Respon.</label>
                            <input type="text" class="form-control" id="nomtrabajador" name="nomtrabajador" value="{{$item->nomtrabajador}}"  required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="3" maxlength="19">
                        </div>
                        <div class="col">
                            <br>
                            <label for="inputCity">Ape. Respon.</label>
                            <input type="text" class="form-control" id="apetrabajador" name="apetrabajador" value="{{$item->apetrabajador}}"  required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="3" maxlength="19">
                        </div>
                    </div>
                </section>
                    <section>
                        <section class="row">
                            <section class="col-4"><br>
                                
                                    <h4><button type="submit" class="btn btn-warning">Actualizar</button></h4>
                                
                            </section>
                            <section class="col-3"><br>
                                <a class="nav-link btn btn-danger " type="button" href="{{ route('sucursal') }}">
                                   Cancelar
                                </a>
                            </section>
                        </section>
                    </section>
                    </form>
                </div>
            </div>
        </div>
    </tr>
    @endforeach
</tbody>
</table>
</div>
    </div>
@endsection