@extends('layout')
@section('contenido')
<br>

  <br>
<h1>Agregar nueva sucursal</h1>
<br><br>
<form method="POST" action="{{ route('sucursal.store') }}">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <label for="inputCity">Nombre de la Sucursal</label>
        <select class="form-select form-control" name="nombre" aria-label="Default select example">
          <option selected>Seleccione una opcion</option>
          @foreach ($datos as $item)
            <option>{{ $item->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputCity">Correo del Responsable</label>
        <select class="form-select form-control" name="responsable" aria-label="Default select example">
          <option selected>Seleccione una opcion</option>
          @foreach ($datos as $item)
            <option>{{ $item->email}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <br>
        <label for="inputCity">Nombre del Responsable</label>
        <input type="text" class="form-control" name="nomtrabajador" placeholder="Nombre(s)" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="3" maxlength="16">
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputCity">Apellido del Responsable</label>
        <input type="text" class="form-control" name="apetrabajador" placeholder="Apellido(s)" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('sucursal') }}">
          <h4><button type="sumit" class="btn btn-warning">Agregar</button></h4>
        </a>
      </div>
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('sucursal') }}">
          <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
        </a>
      </div>
    </div>
  </div>
</form>

@endsection