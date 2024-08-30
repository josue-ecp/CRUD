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
    <h1>Bienvenido a la página principal</h1>
    <p>Desde aquí puedes navegar a los diferentes catálogos:</p>
    <ul>
        <li><a href="{{ route('usuarios.index') }}">Catálogo de Usuarios</a></li>
        <li><a href="{{ route('productos.index') }}">Catálogo de Productos</a></li>
        <li><a href="{{ route('niveles.index') }}">Catálogo de Niveles</a></li>
       
    </ul>
@endsection

</body>
</html>