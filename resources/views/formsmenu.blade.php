@extends('layout')
@section('contenido')
<br>
<h1>Agregar nuevo platillo</h1>
<br><br>
<form action="{{route("menu.store")}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <label for="inputCity">Nombre del Platillo</label>
        <input type="text" class="form-control" name="nomplatillo" id="nomplatillo" placeholder="Ingrese el nombre del platillo" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="4" maxlength="30">
      </div>
      <div class="col-md-6">
        <label for="inputCity">Ingredientes</label>
        <input type="text" class="form-control" placeholder="Ingrese los ingredientes" name="ingrediente" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="3" maxlength="20">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <label for="inputCity">Costos</label>
        <input type="text" class="form-control" placeholder="Ingrese el costo del producto" name="costo" required pattern="^[0-9]+$" minlength="1" maxlength="4">
        <br>
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputCity">Precio de venta</label>
        <input type="text" class="form-control" placeholder="Ingrese el precio de venta" name="precio" required pattern="^[0-9]+$" minlength="1" maxlength="4">
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label for="imagen">Agregar Imagen</label>
        <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Ingrese el nombre del platillo">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('menu') }}">
          <h4><button type="sumit" class="btn btn-warning">Agregar</button></h4>
        </a>
      </div>
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('menu') }}">
          <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
        </a>
      </div>
    </div>
  </div>
</form>

  <br>
@endsection