<?php
    class Persona{
        public $nombre;
        public $edad;
        public $rango="Cliente";
        public $telefono;

        private $datos=[
            "dni"=>"1234567a",
            "mail"=>"abc@mail.com"
        ];

        public function __construct(string $nombre, int $edad){
            $this->nombre=$nombre;
            $this->edad=$edad;
        }
        
        public function setEdad(int $edadNueva){
        $this->edad=$edadNueva;
        }

        public function getEdad():int{
            return $this->edad;
        }

        public function dobleEdad():int{
            return $this->edad*2;
        }

        public function setAdmin(){
            $this->rango="Admin";
        }

        public function getName():string{
            return $this->nombre;
        }

        public function getRange():string{
            return $this->rango;
        }

        public function __get($name){
            if (array_key_exists($name, $this->datos)){
                return $this->datos[$name];
            }
            return "Propiedad '$name' no encontrada.";
        }

        /*public function  __set($name, $value){
            echo "Setting '$name' to '\n";
            $this->data[$name] = $value;
        }*/

        public function __call($method, $arguments){
            if (method_exists($this, $method))
                return new Exception();
        }
    }

    $cliente1 = new Persona("Marie Curie","20");
    //$cliente1->nombre = "Agua";

    $cliente1->setEdad(158);
    $edadMC=$cliente1->getEdad();
    echo "Marie Curie ", $cliente1->getEdad(), "<br>";
    echo "Marie Curie doble ", $cliente1->dobleEdad(), "<br>";
    echo "Marie Curie A ", $cliente1->setEdad(158), "<br>";

    echo "El rango por defecto de ", $cliente1->getname()," es: ", $cliente1->getRange(), "<br>";
    if ($cliente1->getname()=="Marie Curie") $cliente1->setAdmin();

    echo "El rango revisado de ", $cliente1->getname()," es: ", $cliente1->getRange(), "<br>";

    echo "Su telefono es: ", $cliente1?->telefono,"<br>";

    echo "El cliente 1 tiene dni: ",$cliente1->__get("dni"),"<br>";
    $cliente1->__set("dni","12345679");
    echo "El cliente 1 tiene de dirección: ",$cliente1->__get("direccion"),"<br>";

    $cliente1->__call("setEdad", 200);

    echo "La edad INVENTADA de Marie Curie es", $cliente1->getEdad(),"<br>";
    //echo "Nombre: $cliente1->nombre.<br>";
    //echo "Edad: $cliente1->edad.";
?>