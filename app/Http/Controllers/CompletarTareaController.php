<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class CompletarTareaController extends Controller
{
    public function formulario($id)
    {
        // Verificar sesión y rol
        if (!session('usuario') || session('rol') !== 'operario') {
            return redirect()->route('login')->with('error', 'No tienes permisos para acceder a esta página.');
        }

        $tarea = Tarea::una($id);
        return view('tareas.completar', compact('tarea'));
    }

    public function actualizar(Request $request, $id)
    {
        if (!session('usuario') || session('rol') !== 'operario') {
            return redirect()->route('login')->with('error', 'No tienes permisos para actualizar esta tarea.');
        }

        // Validar solo los campos permitidos
        $validated = $request->validate([
            'estado'             => 'required|in:completada,cancelada',
            'anotaciones_despues' => 'nullable',
        ]);

        // Actualizar solo los campos permitidos
        Tarea::modificar($id, [
            'estado' => $validated['estado'],
            'anotaciones_despues' => $validated['anotaciones_despues'],
        ]);

        return redirect()->route('tareas.lista')->with('ok', 'Tarea actualizada correctamente');
    }
}
