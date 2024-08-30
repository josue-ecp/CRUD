<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function formulario($id = null)
    {
        $producto = $id ? Producto::find($id) : null;
        return view('productos.formulario', compact('producto'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image',
        ]);

        if ($request->id) {
            $producto = Producto::find($request->id);
            $producto->fill($request->all());

            if ($request->hasFile('imagen')) {
                Storage::disk('public')->delete($producto->imagen);
                $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
            }

            $producto->save();
        } else {
            $producto = new Producto($request->all());

            if ($request->hasFile('imagen')) {
                $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
            }

            $producto->save();
        }

        return redirect()->route('productos.index');
    }

    public function destroy(Request $request)
    {
        $producto = Producto::find($request->id);
        if ($producto) {
            Storage::disk('public')->delete($producto->imagen);
            $producto->delete();
        }
        return redirect()->route('productos.index');
    }
}
