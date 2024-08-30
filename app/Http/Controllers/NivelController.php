<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::all();
        return view('niveles.index', compact('niveles'));
    }

    public function formulario($id = null)
    {
        $nivel = $id ? Nivel::find($id) : null;
        return view('niveles.formulario', compact('nivel'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'dificultad' => 'required',
        ]);

        if ($request->id) {
            $nivel = Nivel::find($request->id);
            $nivel->fill($request->all());
            $nivel->save();
        } else {
            Nivel::create($request->all());
        }

        return redirect()->route('niveles.index');
    }

    public function destroy(Request $request)
    {
        $nivel = Nivel::find($request->id);
        if ($nivel) {
            $nivel->delete();
        }
        return redirect()->route('niveles.index');
    }
}
