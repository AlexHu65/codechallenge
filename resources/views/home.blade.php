@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col">
            <h1>Empleados</h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

            <div class="btn-group pt-3 pb-3" role="group" aria-label="Basic example">
            <button type="button" data-toggle="modal" data-target="#newModal" class="btn btn-primary">Agregar Nuevo <i class="fas fa-plus"></i></button>

        </div>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Salario (Dolares)</th>
                <th scope="col">Salario (Pesos)</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $item)
                <tr>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->salarioDolares}}</td>
                    <td>{{$item->salarioPesos}}</td>
                    <td>
                        <a type="button" href="{{route('empleado.detalle' ,['id' => $item->id])}}" class="btn btn-info">Ver Más</a>
                        <button data-id={{$item->id}} type="button" class="btn btn-danger delete">Eliminar</button>
                        @if (!$item->activo)
                        <button  data-id={{$item->id}} type="button" class="btn btn-primary activar">Activar</button>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newModalLabel">Nuevo empleado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="{{ route('empleado') }}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Código:</label>
              <input type="text" name="codigo" class="form-control" id="codigo">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Nombre:</label>
              <input type="text" name="nombre" class="form-control" id="codigo">

            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Salario en dolares:</label>
                <input type="text" name="salarioDolares" class="form-control" id="codigo">

              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Salario en pesos:</label>
                <input type="text" name="salarioPesos" class="form-control" id="codigo">

              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control" id="codigo">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Estado:</label>
                <input type="text" name="estado" class="form-control" id="codigo">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Ciudad:</label>
                <input type="text" name="ciudad" class="form-control" id="codigo">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" id="codigo">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Correo:</label>
                <input type="email" name="correo" class="form-control" id="codigo">
              </div>
              <div class="form-group">
                <div class="input-group-text">
                    <input name="activo" type="checkbox" aria-label="Activo"> Activo
                  </div>
              </div>
          <button type="submit" class="btn btn-primary">Guardar</button>

          </form>
        </div>

      </div>
    </div>
  </div>
@endsection
