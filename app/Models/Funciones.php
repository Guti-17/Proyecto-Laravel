<?php

namespace App\Models;

class Funciones
{
    // --- LISTADO DE PROVINCIAS ------------------------------------------------
    public static function provincias()
    {
        $lista = [
            "01" => "Álava",
            "02" => "Albacete",
            "03" => "Alicante",
            "04" => "Almería",
            "05" => "Ávila",
            "06" => "Badajoz",
            "07" => "Islas Baleares",
            "08" => "Barcelona",
            "09" => "Burgos",
            "10" => "Cáceres",
            "11" => "Cádiz",
            "12" => "Castellón",
            "13" => "Ciudad Real",
            "14" => "Córdoba",
            "15" => "A Coruña",
            "16" => "Cuenca",
            "17" => "Girona",
            "18" => "Granada",
            "19" => "Guadalajara",
            "20" => "Guipúzcoa",
            "21" => "Huelva",
            "22" => "Huesca",
            "23" => "Jaén",
            "24" => "León",
            "25" => "Lleida",
            "26" => "La Rioja",
            "27" => "Lugo",
            "28" => "Madrid",
            "29" => "Málaga",
            "30" => "Murcia",
            "31" => "Navarra",
            "32" => "Ourense",
            "33" => "Asturias",
            "34" => "Palencia",
            "35" => "Las Palmas",
            "36" => "Pontevedra",
            "37" => "Salamanca",
            "38" => "Santa Cruz de Tenerife",
            "39" => "Cantabria",
            "40" => "Segovia",
            "41" => "Sevilla",
            "42" => "Soria",
            "43" => "Tarragona",
            "44" => "Teruel",
            "45" => "Toledo",
            "46" => "Valencia",
            "47" => "Valladolid",
            "48" => "Vizcaya",
            "49" => "Zamora",
            "50" => "Zaragoza",
            "51" => "Ceuta",
            "52" => "Melilla",
        ];

        return $lista;
    }

    // --- VALIDACIONES ---------------------------------------------------------
    public static function reglasValidacion()
    {
        $r = [
            'nif_cif'          => 'required',
            'persona_contacto' => 'required',
            'telefono'         => 'required',
            'descripcion'      => 'required',
            'correo'           => 'required|email',
            'provincia'        => 'required',
            'fecha_realizacion' => 'required|date|after:today',

            'direccion'        => 'nullable',
            'poblacion'        => 'nullable',
            'codigo_postal'    => 'nullable|digits:5',
            'operario'         => 'nullable',
            'anotaciones_antes' => 'nullable',
            'anotaciones_despues' => 'nullable',
        ];

        return $r;
    }

    // --- MENSAJES DE ERROR ----------------------------------------------------

    public static function mensajesError()
    {
        return [
            'nif_cif.required'           => 'Es obligatorio indicar un NIF o CIF.',
            'persona_contacto.required'  => 'Debe proporcionar el nombre de la persona de contacto.',
            'telefono.required'          => 'Es necesario indicar un número de teléfono.',
            'descripcion.required'       => 'Tiene que escribir una descripción.',
            'correo.required'            => 'El correo electrónico es un dato obligatorio.',
            'correo.email'               => 'El formato del correo electrónico no es válido.',
            'provincia.required'         => 'Debe elegir alguna provincia.',
            'fecha_realizacion.required' => 'Debe especificar la fecha de realización.',
            'fecha_realizacion.after'    => 'La fecha de realización debe ser en un día posterior al actual.',
            'codigo_postal.digits'       => 'El código postal debe estar formado por 5 cifras.',
        ];
    }


    // --- ATRIBUTOS --------------------------------------------------
    public static function atributosHumanos()
    {
        $a = [
            'nif_cif'           => 'NIF/CIF',
            'persona_contacto'  => 'persona de contacto',
            'telefono'          => 'teléfono',
            'correo'            => 'correo',
            'descripcion'       => 'descripción',
            'direccion'         => 'dirección',
            'poblacion'         => 'población',
            'codigo_postal'     => 'código postal',
            'provincia'         => 'provincia',
            'fecha_realizacion' => 'fecha de realización',
            'anotaciones_antes' => 'anotaciones anteriores',
            'anotaciones_despues' => 'anotaciones posteriores',
        ];

        return $a;
    }

    // --- LIMPIAR TEXTO --------------------------------------------------------
    public static function limpiar($texto)
    {
        $t = strip_tags($texto);
        return trim($t);
    }
}
