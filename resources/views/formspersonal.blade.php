@extends('layout')

@section('contenido')
<br>
<h1>Agregar nuevo personal</h1>
<br><br>
<form action="{{route("personal.store")}}" method="post">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <label for="inputCity">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
      </div>
      <div class="col-md-6">
        <label for="inputCity">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido(s)" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <label for="inputCity">Curp</label>
        <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp" required pattern="^[A-Z0-9]{18}$" minlength="18" maxlength="18">
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputCity">Sucursal</label>
        <select class="form-select form-control" name="cargo" aria-label="Default select example">
          <option selected>Seleccione una opcion</option>
          @foreach ($datos as $item)
            <option>{{ $item->nombre }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <label for="inputCity">Numero telefonico</label>
        <input type="text" class="form-control" id="numerotel" name="numerotel" placeholder="Numero telefonico" required pattern="^[0-9]+$" minlength="10" maxlength="10">
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputCity">Edad</label>
        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" required pattern="^[0-9]+$" minlength="2" maxlength="2">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('personal') }}">
          <h4><button type="submit" class="btn btn-warning">Agregar</button></h4>
        </a>
      </div>
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('personal') }}">
          <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
        </a>
      </div>
    </div>
  </div>
</form>


@endsection