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
    <h1>{{ $nivel ? 'Editar Nivel' : 'Agregar Nivel' }}</h1>
    <form action="{{ url('/niveles/save') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $nivel ? $nivel->id : '' }}">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $nivel ? $nivel->nombre : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $nivel ? $nivel->descripcion : '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="dificultad" class="form-label">Dificultad</label>
            <input type="text" class="form-control" id="dificultad" name="dificultad" value="{{ $nivel ? $nivel->dificultad : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    @endsection
    
</body>
</html>