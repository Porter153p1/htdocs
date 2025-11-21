<?php
// Cliente.php — modelo para clientes
require_once __DIR__ . '/Base.php';

class Cliente extends Base {

    protected static $table = "clientes";

    protected static $fillable = [
        "apellidos",
        "nombre",
        "fecha_nacimiento",
        "ultima_visita",
        "telefono",
        "direccion",
        "peluquero_confianza"
    ];

    //Haciendo el JOIN de peluqueros para que se puedan elegir a la hora de crear un Cliente nuevo
    public static function peluqueroNombre($id) {
        $id = intval($id);
        if ($id <= 0) return "";

        $db = static::conn();
        $res = $db->query("SELECT nombre FROM peluqueros WHERE id=$id");

        $row = $res->fetch_assoc();
        return $row["nombre"] ?? "";
    }
}
