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
<h1>{{ $producto ? 'Editar Producto' : 'Agregar Producto' }}</h1>
<form action="{{ url('/productos/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $producto ? $producto->id : '' }}">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto ? $producto->nombre : '' }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $producto ? $producto->descripcion : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" {{ $producto ? '' : 'required' }}>
        @if ($producto && $producto->imagen)
            <img src="{{ asset('storage/' . $producto->imagen) }}" width="100" alt="{{ $producto->nombre }}" class="mt-2">
        @endif
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $producto ? $producto->precio : '' }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection


</body>
</html>