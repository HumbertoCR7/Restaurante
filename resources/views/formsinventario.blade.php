@extends('layout')
@section('contenido')
<br>
<h1>Agregar nuevo producto</h1>
<br><br>
<form action="{{ route("inventario.store") }}" method="post">
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <label for="inputCity">Codigo</label>
          <input type="text" class="form-control" name="codigo" placeholder="Ingrese el codigo del producto" required pattern="^[0-9]+$" minlength="1" maxlength="5">
        </div>
        <div class="col-md-6">
          <label for="inputCity">Tipo</label>
          <select class="form-select form-control" name="tipo" aria-label="Default select example" required>
            <option selected>Seleccione una opción</option>
            <option>Carne</option>
            <option>Verdura</option>
            <option>Fruta</option>
            <option>Condimento</option>
            <option>Aceites</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <br>
          <label for="inputCity">Nombre del producto</label>
          <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$" minlength="3" maxlength="19">
        </div>
        <div class="col-md-6">
          <br>
          <label for="inputCity">Cantidad</label>
          <input type="text" class="form-control" name="cantidad" placeholder="Ingrese la cantidad" required pattern="^[0-9]+$" minlength="1" maxlength="4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <br>
          <a class="nav-link" href="{{ route('inventario') }}">
            <h4><button type="submit" class="btn btn-warning">Agregar</button></h4>
          </a>
        </div>
        <div class="col-md-6">
          <br>
          <a class="nav-link" href="{{ route('inventario') }}">
            <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
          </a>
        </div>
      </div>
    </div>
  </form>
  

  <br>
@endsection