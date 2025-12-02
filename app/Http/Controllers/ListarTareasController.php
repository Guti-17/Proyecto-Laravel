<?php

namespace App\Http\Controllers;

use App\Models\Tarea;

class ListarTareasController extends Controller
{
    public function lista()
    {
        $tareas = Tarea::todas();
        return view('tareas.lista', compact('tareas'));
    }
}
