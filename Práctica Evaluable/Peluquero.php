<?php
// Peluquero.php — modelo para peluqueros
require_once __DIR__ . '/Base.php';

class Peluquero extends Base {

    protected static $table = "peluqueros";

    protected static $fillable = [
        "nombre"
    ];
}
