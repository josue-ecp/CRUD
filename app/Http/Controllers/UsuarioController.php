<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Otros métodos del controlador...

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function formulario($id = null)
    {
        $usuario = $id ? Usuario::find($id) : new Usuario;
        return view('usuarios.formulario', compact('usuario'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'matricula' => 'required'
        ]);

        if ($request->id) {
            $usuario = Usuario::find($request->id);
            $usuario->fill($request->all());
            $usuario->save();
        } else {
            Usuario::create($request->all());
        }

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
