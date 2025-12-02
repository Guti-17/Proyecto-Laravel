<?php

namespace App\Models;

use mysqli;
use Exception;

class DB
{
    private static $instancia = null;
    private $conexion;

    private function __construct()
    {
        // Cargar desde config(), no env()
        $host = config('database.connections.mysql.host');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $db   = config('database.connections.mysql.database');
        $port = config('database.connections.mysql.port');

        $this->conexion = new mysqli($host, $user, $pass, $db, $port);

        if ($this->conexion->connect_error) {
            throw new Exception("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public static function getConexion()
    {
        if (!self::$instancia) {
            self::$instancia = new DB();
        }
        return self::$instancia->conexion;
    }

    public static function select($sql)
    {
        $res = self::getConexion()->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public static function selectOne($sql)
    {
        $res = self::getConexion()->query($sql);
        return $res ? $res->fetch_assoc() : null;
    }

    public static function insert($sql)
    {
        return self::getConexion()->query($sql);
    }

    public static function update($sql)
    {
        return self::getConexion()->query($sql);
    }

    public static function delete($sql)
    {
        return self::getConexion()->query($sql);
    }
}
