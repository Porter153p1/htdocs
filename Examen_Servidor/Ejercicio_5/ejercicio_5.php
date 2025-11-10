<?php
    function cuentaAtras($numero){
        echo "salida: ";
        //este bucle hace su cosa mientras sea mas pequeño que le núumero que he pasado
        for($i=0;$i<$numero;$i++)
        {
            //hago una cuenta dentro del bucle y le concateno el resultado
            echo $numero-$i." ";
        }
    }

    echo cuentaAtras(5);
?>