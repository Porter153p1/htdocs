<?php
include "clasepersona.php";

class Alumno extends Persona{
    public $matricula;
    public $notas=[5,3,5,3];

    public const Instituto="IES Portada Alta";

    public function __toString()
    {
        return "El alumno {$this->nombre} tiene de matrícula {$this->matricula}.";
    }

    public function HacerMedia() :int{
        return array_sum($this->notas)/count($this->notas);
    }
    public function _construct(string $nombre, int $edad, string $matricula){
        parent::_construct($nombre, $edad);
        // $this->nombre=$nombre;
        // $this->edad=$edad;
        $this->matricula=$matricula;
    }

    //Con Final no se puede sobreescribir después da error si no
    /*
        public function printHola():string{
            return "Buenas";
        }
    */
}

$alumno1=new Alumno("Alfredo", 18);
$alumno1->matricula="5646546";

echo "El alumno ". $alumno1->nombre." tiene de matrícula: ". $alumno1->matricula;
$resultado=$alumno1->__toString();
echo "<br>".$resultado;

echo "<br> La media de " .$alumno1->nombre." es: ".$alumno1->HacerMedia();

echo "<br>".$alumno1->printHola();

//Persona es abstract por lo que no podemos crear clases de ella
//$personita=new Persona("Esto no debe funcionar");

echo "<br>". $alumno1::Instituto;
?>