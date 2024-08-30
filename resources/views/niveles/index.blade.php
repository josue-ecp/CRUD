<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Niveles</h1>
    <a href="{{ url('/niveles/formulario') }}" class="btn btn-primary">Agregar Nivel</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Dificultad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($niveles as $nivel)
        <tr>
            <td>{{ $nivel->id }}</td>
            <td>{{ $nivel->nombre }}</td>
            <td>{{ $nivel->descripcion }}</td>
            <td>{{ $nivel->dificultad }}</td>
            <td>
                <a href="{{ url('/niveles/formulario', $nivel->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('/niveles/save') }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $nivel->id }}">
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

</body>
</html>