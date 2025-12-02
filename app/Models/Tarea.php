<?php

namespace App\Models;

use App\Models\DB;

class Tarea
{
    public static function todas()
    {
        return DB::select("SELECT * FROM tareas ORDER BY id DESC");
    }

    public static function una($id)
    {
        return DB::selectOne("SELECT * FROM tareas WHERE id = $id");
    }

    public static function crear($data)
    {
        extract($data);

        // Estado por defecto si no viene del formulario
        if (!isset($estado) || $estado === null || $estado === '') {
            $estado = 'B'; // Esperando ser aprobada (por defecto)
        }

        return DB::insert("INSERT INTO tareas 
        (nif_cif, persona_contacto, telefono, descripcion, correo, direccion, poblacion, codigo_postal, provincia, estado, operario, fecha_realizacion, anotaciones_antes, anotaciones_despues)
        VALUES (
            '$nif_cif', '$persona_contacto', '$telefono', '$descripcion', '$correo',
            '$direccion', '$poblacion', '$codigo_postal', '$provincia', '$estado',
            '$operario', '$fecha_realizacion', '$anotaciones_antes', '$anotaciones_despues'
        )");
    }

    public static function modificar($id, $data)
{
    $tarea_actual = self::una($id);

    // Usamos los datos del formulario o los actuales si no vienen
    $nif_cif           = $data['nif_cif'] ?? $tarea_actual['nif_cif'];
    $persona_contacto  = $data['persona_contacto'] ?? $tarea_actual['persona_contacto'];
    $telefono          = $data['telefono'] ?? $tarea_actual['telefono'];
    $descripcion       = $data['descripcion'] ?? $tarea_actual['descripcion'];
    $correo            = $data['correo'] ?? $tarea_actual['correo'];
    $direccion         = $data['direccion'] ?? $tarea_actual['direccion'];
    $poblacion         = $data['poblacion'] ?? $tarea_actual['poblacion'];
    $codigo_postal     = $data['codigo_postal'] ?? $tarea_actual['codigo_postal'];
    $provincia         = $data['provincia'] ?? $tarea_actual['provincia'];
    $estado            = $data['estado'] ?? $tarea_actual['estado'];
    $operario          = $data['operario'] ?? $tarea_actual['operario'];
    $fecha_realizacion = $data['fecha_realizacion'] ?? $tarea_actual['fecha_realizacion'];
    $anotaciones_antes = $data['anotaciones_antes'] ?? $tarea_actual['anotaciones_antes'];
    $anotaciones_despues = $data['anotaciones_despues'] ?? $tarea_actual['anotaciones_despues'];

    return DB::update("
        UPDATE tareas SET
            nif_cif='$nif_cif',
            persona_contacto='$persona_contacto',
            telefono='$telefono',
            descripcion='$descripcion',
            correo='$correo',
            direccion='$direccion',
            poblacion='$poblacion',
            codigo_postal='$codigo_postal',
            provincia='$provincia',
            estado='$estado',
            operario='$operario',
            fecha_realizacion='$fecha_realizacion',
            anotaciones_antes='$anotaciones_antes',
            anotaciones_despues='$anotaciones_despues'
        WHERE id=$id
    ");
}


    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM tareas WHERE id = $id");
    }
}
