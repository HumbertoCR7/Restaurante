@extends('layout')

@section('contenido')
<br>
<h1>Menu</h1>
<form action="{{route("menu")}}" method="GET" class="form-inline my-2 my-lg-0 float-right" >
  @csrf
  <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@role('admin') 
<a class="nav-link" href="{{ route('menu.create') }}"><h4><button type="button" class="btn btn-warning">Agregar nuevo platillo</button></a><br>
  @endrole 
  @if (session("correcto"))
 <section class="alert alert-success">{{session("correcto")}}</section>
 @endif

 @if (session("incorrecto"))
 <section class="alert alert-danger">{{session("incorrecto")}}</section>
 @endif
 <div class="row">
  @foreach ($datos as $item)
    <div class="col-md-4" style="width height 100%">
      <div class="card margincart" >
        <img src="{{$item->imagen}}" class="card-img-top img-fluid img-thumbnail" alt="...">
        <div class="card-body">
            <p class="card-text">{{$item->nomplatillo}}</p>
            <h6>Ingredientes: {{$item->ingrediente}}<br></h6>
            <h6>Costo: ${{$item->costo}}MXN<br></h6>
            <h6>Precio de venta: ${{$item->precio}}MXN<br><br></h6>
    
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col">
                    @role('admin')
                    <a href="{{route("menu.edit", $item->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">Actualizar</a>
                </div>
                <div class="col">
                    <form action="{{route("menu.destroy",$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    @endrole
                </div>
            </div>
        </div>
    </div>
    
          <!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Actualizar platillo</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{route("menu.update", $item->id)}}">
  @csrf
  @method('PUT')
  <section class="container"> 
  <div class="form-row">
          <div class="row">
            <label for="inputCity">Nombre del Platillo</label>
            <input type="text" class="form-control" id="nomplatillo" name="nomplatillo" value="{{$item->nomplatillo}}" required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="4" maxlength="18"
           >    
          </div>
          <br><br>
          <div class="row">
            <label for="inputCity">Ingredientes</label>
            <input type="text" class="form-control"  id="ingrediente" name="ingrediente" value="{{$item->ingrediente}}"  required  pattern="^[a-zA-Z]+(\s[a-zA-Z]+)?$"  minlength="3" maxlength="20"
            >
          </div>
            <div class="row">
                <label for="inputCity">Costo</label>
              <input type="text" class="form-control"  id="costo" name="costo" value="{{$item->costo}}"  required  pattern="^[0-9]+$" minlength="1" maxlength="4"
              >
            </div>
            <div class="row">
                <label for="inputCity">Precio de venta</label>
              <input type="text" class="form-control"  id="precio" name="precio" value="{{$item->precio}}"  required  pattern="^[0-9]+$" minlength="1" maxlength="4"
              >
            </div>
          </div>
        </section>   
    
      <section>
        <section class="row">
          <section class="col-4"><br>
            <button type="submit" class="btn btn-warning">Modificar</button>
            
          </section>
          <section class="col-4"><br>
          
              <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
             
          </section>
        </section>
      </section>
    </form> 
  </div>
</div>
</div>
</div>
    </div>
  @endforeach
</div>
@endsection

