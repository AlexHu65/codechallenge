@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{route('home')}}">Volver</a>

    <div class="row justify-content-center">
        <div class="col">
            <h1>Empleado</h1>
            <h2>{{$empleado->nombre}}</h2>
            <h3>Salario en dolares:{{$empleado->salarioDolares}}</h3>
            <h3>Salario en pesos:{{$empleado->salarioPesos}}</h3>
            <h3>Dirección:{{$empleado->direccion}}</h3>
            <h3>Estado:{{$empleado->estado}}</h3>
            <h3>Ciudad:{{$empleado->ciudad}}</h3>
            <h3>Teléfono:{{$empleado->telefono}}</h3>
            <h3>Correo:{{$empleado->correo}}</h3>
        </div>
    </div>
</div>


@endsection
