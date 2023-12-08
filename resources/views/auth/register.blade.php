@extends('layout')
@section('contenido')
<x-guest-layout>
  <br>
<h1>Agregar nueva sucursal</h1>
<br><br>
<form method="POST" action="{{ route('register') }}">
@csrf
      <div class="form-row">
        <div class="col">
          <label for="inputCity">Nombre de la nueva sucursal</label>
          <x-text-input class="form-control" id="name" placeholder="Ingrese el nombre de la nueva sucursal" type="text" name="nombre" name="name" :value="old('name')" required autofocus autocomplete="name" />
         <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="col">
          <label for="inputCity">Ingrese correo</label>
          <x-text-input class="form-control" placeholder="Ejemplo@gmail.com"  name="ubicacion"  id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>

     <div class="form-row">
          <div class="col">
            <br>
              <label for="password">Ingrese una contraseña</label>
        
              <x-text-input class="form-control" placeholder="Ingrese el numero de trabajadores" id="password"  type="password" name="password" required autocomplete="new-password" />
  
              <x-input-error :messages="$errors->get('password')" class="mt-2" />



          </div>
          <div class="col">
            <br>
              <label for="inputCity">Confirmar contraseña</label>
                      <x-text-input  placeholder="Conformar contraceña"   id="password_confirmation" class="block mt-1 w-full"
                            type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

          </div>
        </div>
        <section>
          <section class="row">
            <section class="col-2"><br>
                <x-primary-button  class="btn btn-warning">  {{ __('Register') }} </x-primary-button>
              </a>
            </section>
            <section class="col-2"><br>
              <a class="nav-link" href="{{ route('inventario') }}">
                <h4><button type="button" class="btn btn-danger">Cancelar</button></h4>
              </a>
            </section>
          </section>
        </section>
           <!-- Confirm Password -->
   

      <div class="flex items-center justify-end mt-4">
          <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
              {{ __('Already registered?') }}
          </a>

  
          
      </div>
  </form>
</x-guest-layout>
@endsection