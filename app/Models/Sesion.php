<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Sesion
{
    // Instancia única
    private static $instancia = null;

    // Constructor privado para Singleton
    private function __construct()
    {
        // Nada por ahora
    }

    // Método para obtener la instancia única
    public static function getInstancia()
    {
        if (self::$instancia === null) {
            self::$instancia = new Sesion();
        }
        return self::$instancia;
    }

    // Método para verificar login
    public function login($usuario, $password)
    {
        // Conexión a MySQL de XAMPP directamente usando DB facade
        $user = DB::connection('mysql')->table('usuarios')
            ->where('usuario', $usuario)
            ->where('password', $password)
            ->first();

        return $user;
    }

    // Método para obtener rol
    public function rol($usuario)
    {
        $user = DB::connection('mysql')->table('usuarios')
            ->where('usuario', $usuario)
            ->first();

        return $user ? $user->rol : null;
    }
}
