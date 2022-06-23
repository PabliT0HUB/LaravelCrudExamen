@extends('layouts.plantilla')
@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Listado de PACIENTES</h1>
@stop

@section('content')
   <a href="crud/create" class="btn btn-primary mb-3">CREAR</a>

<table id="crud" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Documento</th>
            <th scope="col">TipoDeDocumento</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Género</th>
            <th scope="col">FechaDeNacimiento</th>
            <th scope="col">EstadoCivil</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->id}}</td>
            <td>{{$paciente->documento}}</td>
            <td>{{$paciente->tipoDocumento}}</td>
            <td>{{$paciente->nombres}}</td>
            <td>{{$paciente->apellidos}}</td>
            <td>{{$paciente->direccion}}</td>
            <td>{{$paciente->telefono}}</td>
            <td>{{$paciente->genero}}</td>
            <td>{{$paciente->fechaNacimiento}}</td>
            <td>{{$paciente->estadoCivil}}</td>
            <td>
                <form action="{{ route ('pacientes.destroy',$paciente->id)}}" method="POST">
                <a href="/crud/{{ $paciente->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#articulos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop