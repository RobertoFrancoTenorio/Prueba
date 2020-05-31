<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function nuevoUser(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->userName = $request->userName;
        $user->apellidoP = $request->apellidoP;
        $user->apellidoM = $request->apellidoM;
        $user->passwd = $request->passwd;
        $user->email = $request->email;
        $user->tipo = $request->tipo;

        $user->save();

        return redirect('/');
    }
}
