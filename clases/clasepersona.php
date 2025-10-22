<?php
abstract class Persona{
    public $nombre;
    public $edad;
    private $rango="Cliente";
    public $telefono;

    public static $total=0;

    public static function getTotal():int{
        return Persona::$total;
    }

    public static function reset():int{
      Persona::$total=0;
      return Persona::$total;
    }

    //Nos permite editar el serialize para que de menos datos
    //Serialize sin achicar: O:6:"Alumno":5:{s:6:"nombre";s:4:"Pepe";s:4:"edad";i:18;s:14:"Personarango";s:7:"Cliente";s:8:"telefono";N;s:14:"Personadatos";a:2:{s:3:"dni";s:8:"00000000";s:5:"email";s:17:"notengo@email.com";}}
    public function __sleep(){
        return ["nombre"];
    }

    public function __wakeup(){
        $this->edad=20;
    }

    private $datos=[
        'dni'=>'00000000',
        'email'=>'notengo@email.com'
    ];

    final public function printHola():string{
        return "Hola";
    }

    public function __construct(String $nombre, int $edad){
    $this->nombre = $nombre;
    $this->edad = $edad;
    Persona::$total++;
    }

    public function setEdad(int $edadNueva){
        $this->edad = $edadNueva;
    }

    public function getEdad():int{
        return $this->edad;
    }

    #si no hay return no puedes imprimir o sacar nada, no te devuelve nada. 
    #(Es como si usaras el get en la misma funcion)
    public function doubleEdad():int{
        $this->edad=$this->edad*2;
        return $this->edad;
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

    //Cuando tengo en datos un diccionario, con key-value es mas facil
    //crear este metodo para acceder a sus key-value
    //y ver si estan definidos
    public function __get($name){
        if(array_key_exists($name, $this->datos)){
            return $this->datos[$name];
        }
        return "Propiedad '$name' no encontrada.";
    }
//vamos a hacer un set a un key, mediante la llamada
//__set($key,$value)
    public function __set($name, $value){
        echo "Setting '$name' to '$value'\n";
        $this->datos[$name] = $value;
    }

    public function __call($method, $arguments){
        if(method_exists($this,$method))
            $this->$method($arguments);
        return new Exception;
    }

}