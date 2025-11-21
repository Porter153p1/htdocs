<?php
// Base.php — clase base con CRUD simple usando mysqli
require_once __DIR__ . '/db.php';

abstract class Base {

    protected static $table;        //Aqui se nos guarda con que tabla estamos trabajando (Cliente o Peluquero) 
    protected static $fillable;     //Aqui se nos guarda los campos de la tabla

    protected static function conn() {
        global $conn;
        return $conn;
    }

    public static function all($orderBy = null) {
        $sql = "SELECT * FROM " . static::$table;
        if ($orderBy) {
            $sql .= " ORDER BY " . static::conn()->real_escape_string($orderBy);
        }

        $res = static::conn()->query($sql);
        $data = [];

        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //Nos hace un select de una fila de la tabla con el id
    public static function find($id) {
        $id = intval($id);
        $res = static::conn()->query("SELECT * FROM " . static::$table . " WHERE id=$id");
        return $res->fetch_assoc();
    }

    //Nos inserta un registro en la tabla
    public static function create($data) {
        $fields = [];
        $values = [];

        foreach (static::$fillable as $f) {
            if (isset($data[$f]) && $data[$f] !== "") {
                $fields[] = $f;
                $values[] = "'" . static::conn()->real_escape_string($data[$f]) . "'";
            }
        }

        if (!$fields) return false;

        $sql = "INSERT INTO " . static::$table . " (" . implode(",", $fields) . ")
                VALUES (" . implode(",", $values) . ")";

        static::conn()->query($sql);
        return static::conn()->insert_id;
    }

    //Actualiza una fila ya existente de la talba
    public static function update($id, $data) {
        $id = intval($id);
        $sets = [];

        foreach (static::$fillable as $f) {
            if (isset($data[$f])) {
                $v = static::conn()->real_escape_string($data[$f]);
                $sets[] = "$f='$v'";
            }
        }

        if (!$sets) return false;

        $sql = "UPDATE " . static::$table . " SET " . implode(",", $sets) . " WHERE id=$id";
        return static::conn()->query($sql);
    }

    //Borra una fila de la tabla
    public static function delete($id) {
        $id = intval($id);
        return static::conn()->query("DELETE FROM " . static::$table . " WHERE id=$id");
    }
}
