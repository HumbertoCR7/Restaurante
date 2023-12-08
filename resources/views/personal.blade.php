@extends('layout')

@section('contenido')
<br>
<h1 class="text-center">Personal</h1>
<br>
<div class="row">
    <div class="col-11">
        <a class="nav-link" href="{{ route('personal.create') }}">
            <button type="button" class="btn btn-warning">Agregar nuevo personal</button>
        </a>
    </div>
    <div class="col-1">
        <a class="btn btn-secondary" href="{{ route('personalPDF.pdf') }}">Imprimir</a>
    </div>
</div>
<br>
<div class="table-responsive telefono">
  <table class="table table-bordered table-hover">
      <thead class="thead-light">
          <tr>
              <th>Nom.</th>
              <th>Apellido</th>
              <th>Curp</th>
              <th>Sucur.</th>
              <th>No. tel.</th>
              <th>Edad</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($personal as $item)
              <tr>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->apellido}}</td>
                  <td>{{$item->curp}}</td>
                  <td>{{$item->cargo}}</td>
                  <td>{{$item->numerotel}}</td>
                  <td>{{$item->edad}}</td>
                  <td>
                      <div class="d-flex justify-content-between">
                          <a href="{{route("personal.edit", $item->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Actualizar</a>
                          <form action="{{route("personal.destroy",$item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                          </form>
                      </div>
                  </td>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel">Actualizar trabajador</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{route("personal.update", $item->id)}}">
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                      <div class="col-md-6">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
                      </div>
                      <div class="col-md-6">
                          <label for="apellido">Apellido</label>
                          <input type="text" class="form-control" id="apellido" name="apellido" value="{{$item->apellido}}" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6">
                          <label for="curp">Curp</label>
                          <input type="text" class="form-control" id="curp" name="curp" value="{{$item->curp}}" required pattern="^[A-Z0-9]{18}$" minlength="18" maxlength="18">
                      </div>
                      <div class="col-md-6">
                          <label for="cargo">Sucursal</label>
                          <input type="text" class="form-control" id="cargo" name="cargo" value="{{$item->cargo}}" readonly>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6">
                          <label for="numerotel">Número telefónico</label>
                          <input type="text" class="form-control" id="numerotel" name="numerotel" required required value="{{$item->numerotel}}" pattern="^[0-9]+$" minlength="10" maxlength="10">
                      </div>
                      <div class="col-md-6">
                          <label for="edad">Edad</label>
                          <input type="text" class="form-control" id="edad" name="edad" value="{{$item->edad}}" required pattern="^[0-9]+$" minlength="2" maxlength="2">
                      </div>
                  </div>
                  <div class="d-flex justify-content-between mt-3">
                      <button type="submit" class="btn btn-warning">Modificar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
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