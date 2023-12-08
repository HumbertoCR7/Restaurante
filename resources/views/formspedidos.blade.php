@extends('layout')
@section('contenido') 
<br>
<h1>Realizar pedido</h1>
<br>
<form action="{{route("pedidos.store")}}" method="post">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <label for="inputCity">Nombre del cliente </label>
        <input type="text" class="form-control"  name="nomcliente" placeholder="Ingrese el nombre del cliente" required pattern="^[a-zA-Z]+$" minlength="3" maxlength="17">    
      </div>
      <div class="col-md-6">
        <label for="inputCity">Nombre del platillo</label>
        <select class="form-select form-control" name="nomplatillo" aria-label="Default select example" >
          <option selected>Seleccione una opcion</option>
          @foreach ($datos as $item)
            <option>{{ $item->nomplatillo}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <label for="inputCity">Precio</label>
        <input type="text" class="form-control" name="precio" placeholder="Ingrese el costo del producto" required pattern="^[0-9]+$" minlength="2" maxlength="4">
      </div>
      <div class="col-md-6">
        <br>
        <label for="inputCity">No. mesa</label>
        <input type="text" class="form-control" name="nummesa" placeholder="Ingrese el numero de mesa" required pattern="^[0-9]+$" minlength="1" maxlength="2">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('pedidos') }}">
          <h4><button type="sumit" class="btn btn-warning">Agregar</button></h4>
        </a>
      </div>
      <div class="col-md-6">
        <br>
        <a class="nav-link" href="{{ route('pedidos') }}">
          <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
        </a>
      </div>
    </div>
  </div>
</form>

    @endsection