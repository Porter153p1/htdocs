<?php
    $string="a           b";
    function normalizaFrase($s){
        //lo pone en mayusculas
        strtoupper($s);
        //le quita los espacios innecesarios, esto lo hace mirando donde hay espacios extra y los quita 
        preg_replace('/\s/','',$s);
        return $s;
    }
    echo normalizaFrase($string);
?>