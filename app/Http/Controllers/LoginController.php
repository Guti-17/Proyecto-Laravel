<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function formulario()
    {
        return view('tareas.login');
    }


public function acceder(Request $request)
{
    $usuario = $request->input('usuario');
    $password = $request->input('password');

    $sesion = Sesion::getInstancia();
    $user = $sesion->login($usuario, $password);

    if ($user) {
        session(['usuario' => $user->usuario, 'rol' => $user->rol]);
        return redirect()->route('tareas.lista');
    } else {
        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
}


    public function salir()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
