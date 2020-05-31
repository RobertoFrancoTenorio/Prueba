<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perritoController extends Controller
{
    public function creaPerrito(Request $request)
    {
        $perrito = new Perrito();
        $perrito->nombre = $request->nombre;
        $perrito->raza = $request->raza;
        $perrito->edad = $request->edad;
        $perrito->tamaño = $request->tamaño;
        $perrito->descripcion = $request->descripcion;
        $perrito->estado = $request->estado;        
        $request->file('rutaimg')->storeAs('public', $perrito->nombre.'.'.$request->file('rutaimg')->getClientOriginalExtension());
        $perrito->rutaimg=$perrito->nombre.'.'.$request->file('rutaimg')->getClientOriginalExtension();
    
        $perrito->save();

        return redirect('/');
    }
}
