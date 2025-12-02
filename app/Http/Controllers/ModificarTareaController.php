<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Funciones;

class ModificarTareaController extends Controller
{
    public function formulario($id)
    {
        // Solo administrativos
        if (!session('usuario') || session('rol') !== 'administrativo') {
            return redirect()->route('login')->with('error', 'No tienes permisos para acceder a esta página.');
        }

        $tarea = Tarea::una($id);
        return view('tareas.editar', compact('tarea'));
    }

    public function actualizar(Request $request, $id)
    {
        // Solo administrativos
        if (!session('usuario') || session('rol') !== 'administrativo') {
            return redirect()->route('login')->with('error', 'No tienes permisos para modificar tareas.');
        }

        // Validación completa
        $validated = $request->validate(
            Funciones::reglasValidacion(),
            Funciones::mensajesError(),
            Funciones::atributosHumanos()
        );

        // Recuperamos la tarea actual
        $tarea_actual = Tarea::una($id);

        // Combinamos datos existentes con los enviados por el formulario
        $datos_a_modificar = array_merge($tarea_actual, $validated);

        // Modificamos la tarea
        Tarea::modificar($id, $datos_a_modificar);

        return redirect()->route('tareas.lista')->with('ok', 'Tarea modificada correctamente');
    }
}
