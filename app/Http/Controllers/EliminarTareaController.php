<?php

namespace App\Http\Controllers;

use App\Models\Tarea;

class EliminarTareaController extends Controller
{
    public function eliminar($id)
    {
        // Verificar sesión y rol
        if (!session('usuario') || session('rol') !== 'administrativo') {
            return redirect()->route('login')->with('error', 'No tienes permisos para eliminar tareas.');
        }

        Tarea::eliminar($id);
        return redirect()->route('tareas.lista')->with('ok', 'Tarea eliminada correctamente');
    }
}
