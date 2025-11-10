<?php
    //en C# para sacar la longitud de un array basta con poner array.lenght para sacarla en php no se
    $array=[1,2,3,4];
    $umbral_numeros=5;
    function filtraMayores($num, $umbral){
        $cantidad=0;
        $numlenght=4;
        //compruebo si esta definido si no le paso un 0
        if(!isset($num)){
                return 0;
            }
        
        for($i=0; $i<$numlenght; $i++)
        {
            //Si es mas pequeño que este valor del array en tal caso le sumo 1 a lo que devuelvo
            if($num[$i]<$umbral)$cantidad++;;
        }
        return $cantidad;
    }
    echo filtraMayores($array, $umbral_numeros);
?>