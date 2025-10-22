<?php
include "clasepersona.php";

// Da error porque no se puede crear algo en una clase abstract
// $persona1=new Persona("Pepe", 18);

class Alumno extends Persona{

}
//Ahora no da problemas porque no la hacemos de una clase abstract si no de su heredada
$alumno1=new Alumno("Pepe", 18);

echo "El alumno " .$alumno1->nombre." tiene ".$alumno1->getEdad()."años<br>";
echo "En el sistema hay " .$alumno1->getTotal()." registro.<br>";

echo "<br>";

$alumno2=new Alumno("María", 22);
echo "El alumno " .$alumno2->nombre." tiene ".$alumno2->getEdad()."años<br>";
echo "En el sistema hay " .$alumno1->getTotal()." registro.<br>";
echo "En el sistema hay " .$alumno2->getTotal()." registro.<br>";

echo "<br>";

$alumno1->reset();

echo "En el sistema hay " .$alumno1->getTotal()." registro.<br>";

echo serialize($alumno1);
//serialize muestra los datos de esa variable:
// O:6:"Alumno" Objeto Alumno con 6 carácteres
// :2:{
//      s:6:"nombre";s:4:"Pepe" Atributo nombre con valor Pepe
//      ;s:4:"edad";i:18;       Atributo edad con valor 18
//      }
$miserial= serialize($alumno1);
$copia= unserialize($miserial);

echo "<br>";

echo "<br> En el sistema hay ".$copia->getTotal()." registros (alumno: " .$copia->nombre.").<br>";

echo "<br>";

var_dump($alumno1->__sleep());

var_dump($copia);
?>