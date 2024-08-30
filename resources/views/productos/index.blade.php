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
    <h1>Productos</h1>
    <a href="{{ url('/productos/formulario') }}" class="btn btn-primary">Agregar Producto</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td><img src="{{ asset('storage/' . $producto->imagen) }}" width="50" alt="{{ $producto->nombre }}"></td>
            <td>{{ $producto->precio }}</td>
            <td>
                <a href="{{ url('/productos/formulario', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('/productos/save') }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

</html>
</body>
</html>