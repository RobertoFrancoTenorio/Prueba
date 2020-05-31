<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function creaUsuario(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->passwd = $request->passwd;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $request->file('imagen')->storeAs('public', $usuario->nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
        $usuario->rutaimg=$usuario->nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        
        $usuario->save();

        return redirect('/');
    }

    public function inicio()
    {
        return view('welcome');
    }

    public function usuarios()
    {
        return view('usuariosRegistrados');
    }

    public function registroUsuarios()
    {
        return view('registroDeUsuarios');
    }
//Carga los usuarios registraados
    public function muestraUsuarios()
    {
        $usuarios = Usuario::all();
        return view('usuariosRegistrados')->with('usuario',$usuarios);
    }
//Muestra la información de los usuarios
    public function modificaUsuario($id)
    {
        $usuarios=Usuario::find($id);
        return view('editaUsuario')->with('Usuario',$usuarios);
    }
//Editar Informacion

    public function editaDatos(Request $request,$id)
    {
        $nuevo=request()->except(['_token','_method']);
        $usuario=Usuario::where('id','=',$id)->first();
        $usuario->update($nuevo); 
        $request->file('rutaimg')->storeAs('public', $usuario->nombre.'.'.$request->file('rutaimg')->getClientOriginalExtension());
        $usuario->rutaimg=$usuario->nombre.'.'.$request->file('rutaimg')->getClientOriginalExtension();

        $usuario->save();
        return redirect('/usuarios');
    }

    public function Elimina($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
