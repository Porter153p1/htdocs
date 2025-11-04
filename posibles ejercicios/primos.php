<?php
$num= 32;

function esPrimo($num){
    $primo=true;
    if($num===1)$primo=false;
    else if($num===2)$primo=true;
    else if($num%2===0){
        $primo=false;
        echo "Par y ";
    }else {
            for($i=2;$i<$num;$i++)
            {
                echo "Probando $i <br>";
                if($num%$i === 0)
                    {
                        $primo =false;
                        break;
                    }
            }
    }
    return $primo;
}

if(esPrimo($num)) echo "Es primo $num";
else echo "No es primo $num"
?>