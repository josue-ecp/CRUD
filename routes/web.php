<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NivelController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/formulario/{id?}', [UsuarioController::class, 'formulario'])->name('usuarios.formulario');
Route::post('/usuarios/save', [UsuarioController::class, 'save'])->name('usuarios.save');
Route::delete('/Usuarios/{id}', [UsuarioController::class, 'destroy'])->name('destroy.usuarios');

// Rutas para productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/formulario/{id?}', [ProductoController::class, 'formulario'])->name('productos.formulario');
Route::post('/productos/save', [ProductoController::class, 'save'])->name('productos.save');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('destroy.productos');

// Rutas para niveles
Route::get('/niveles', [NivelController::class, 'index'])->name('niveles.index');
Route::get('/niveles/formulario/{id?}', [NivelController::class, 'formulario'])->name('niveles.formulario');
Route::post('/niveles/save', [NivelController::class, 'save'])->name('niveles.save');
Route::delete('/niveles/{id}', [NivelController::class, 'destroy'])->name('destroy.niveles');


