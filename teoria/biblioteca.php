<?php
session_start(["cookie_lifetime" => 86400]);

    $pi=3.14;

    function sumar($a, $b){
        return $a+$b;
    }
    function multiplicar($a, $b){
        return $a*$b;
    }
    function dividir($a, $b){
        return $a/$b;
    }
    function potencia($a, $b){
        return $a^$b;
    }

    function factorial($n){
        if($n>=0){
            if($n==1) return 1;
            else return $n*factorial($n-1);
        }else{
            return -1;
        }
    }

    /*function fibonacci($f){
        if($f===0){
            return 0;
        }else if($f===1){
            return 1;
        }else if($f<0){
            return "Número Negativo";
        }else {
            $a=$f;
            for($i=0;$i<$f;$i++)
                {
                    $f--;
                    $a+=$f;
                }
            return $a-1;
        }
    }*/
    //Esta mal
?>