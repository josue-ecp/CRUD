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
<h1>{{ $usuario ? 'Editar Usuario' : 'Agregar Usuario' }}</h1>
<form action="{{ url('/usuarios/save') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $usuario ? $usuario->id : '' }}">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario ? $usuario->nombre : '' }}" required>
    </div>
    <div class="mb-3">
        <label for="matricula" class="form-label">Matrícula</label>
        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $usuario ? $usuario->matricula : '' }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection

</body>
</html>