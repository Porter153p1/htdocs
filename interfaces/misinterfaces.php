<?php
interface VehiculoAux{
    /*aqui defino los metodos que son diferentes para cada subclase */
    public function arrancar();
    public function detener();
    public function adelantar();
}

class Vehiculo{
    private $matricula="";
    private $user="";
    private $tipo="";

    public function __construct(string $mat, string $us, string $tipov){
        $this->matricula=$mat;
        $this->user=$us;
        $this->tipo=$tipov;
    }

    public function getMatricula():String{
        return $this->matricula;
    }

}

class Coche extends Vehiculo implements VehiculoAux{
    public function __construct(string $mat, string $us){
        parent::__construct($mat, $us, "Coche");
    }

    public function arrancar(){
        echo "El coche se ha arrancado.\n";
    }
    public function detener(){
        echo "El coche se ha detenido.\n";
    }
    public function adelantar(){
        echo "El coche:{$this->getMatricula()} adelanta por el carril izquierdo.\n";
    }

}

class Moto extends Vehiculo implements VehiculoAux{
    public function __construct(string $mat, string $us){
        parent::__construct($mat, $us, "Moto");
    }

    public function arrancar(){
        echo "La moto se ha arrancado.\n";
    }
    public function detener(){
        echo "La moto se ha detenido.\n";
    }
    public function adelantar(){
        echo "La moto:{$this->getMatricula()} adelanta por donde quiere.\n";
    }

}

$micochecito=new Coche("123134","Javi");
$micochecito->adelantar();
echo "<br>";
$micochecito=new Moto("12345","Javi");
$micochecito->adelantar();


?>