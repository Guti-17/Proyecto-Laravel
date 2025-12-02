<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class CrearTareaController extends Controller
{
    public function formulario()
    {
        // Solo los administrativos pueden crear
        if (session('rol') !== 'administrativo') {
            return redirect()->route('tareas.lista')->with('error', 'No tienes permiso para crear tareas');
        }

        return view('tareas.crear');
    }

    public function guardar(Request $request)
    {
        // Solo los administrativos pueden guardar
        if (session('rol') !== 'administrativo') {
            return redirect()->route('tareas.lista')->with('error', 'No tienes permiso');
        }

        // VALIDACIÓN BÁSICA
        $request->validate([
            'nif_cif' => 'required',
            'persona_contacto' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required',
            'correo' => 'required|email',
            'provincia' => 'required',
            'fecha_realizacion' => 'nullable|date|after:today',
            'codigo_postal' => 'nullable|digits:5'
        ]);

        // CREAR TAREA usando el modelo con DB directo
        Tarea::crear([
            'nif_cif' => $request->nif_cif,
            'persona_contacto' => $request->persona_contacto,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'provincia' => $request->provincia,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'operario' => $request->operario,
            'fecha_realizacion' => $request->fecha_realizacion,
            'anotaciones_antes' => $request->anotaciones_antes,
            'anotaciones_despues' => $request->anotaciones_despues,
            'estado' => 'B', // Por defecto: esperando
        ]);

        return redirect()->route('tareas.lista')->with('ok', 'Tarea creada correctamente');
    }
}
