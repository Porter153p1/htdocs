<?php
    class Persona{
        private $nombre;
        public function __construct($nombre)
        {
            return $this->nombre=$nombre;
        }

        public function getNombre():string
        {
            return $this->nombre;
        }
    }

    class Profesor extends Persona{
        use Tutor;
        public function __construct($nombre,$unidad)
        {
            parent::__construct($nombre);
            $this->unidad=$unidad;
        }
    }

    trait Tutor{
        protected $unidad;
        public function info()
        {
            echo "Es tutor de $this->unidad<br>";
        }
    }

    $miprofe=new Profesor("Javi", "2DAW");

    $miprofe->info();

    echo $miprofe->getNombre()."<br>";

    enum Palos{
        case Treboles;
        case Picas;
        case Corazones;
        case Diamantes;

        public function palo():string{
            return match($this){
                self::Treboles=>"♣",
                self::Picas=>"♠",
                self::Corazones=>"♥",
                self::Diamantes=>"♦",
            };
        }

        public function paloTXT():string{
            return $this->name;
        }

        public function reasigna(){
            $arr=self::cases();
            return $arr[array_rand($arr)];
        }
    }

    $tipocartas=Palos::Diamantes;

    echo $tipocartas->name .": ". $tipocartas->palo()."<br>";
    var_dump($tipocartas);
    echo "<br>";

    if($tipocartas===Palos::Corazones) echo "Es Corazones"."<br>";
    else echo "No es corazones"."<br>";

    class Carta{
        private $numero;
        private $palo;

        public function __construct(string $numero, Palos $palo){
            $this->palo=$palo;
            $this->numero=$numero;
        }

        public function getPalo():string{
            return $this->palo->palo();
        }

        public function getPaloTXT():string{
            return $this->palo->paloTXT();
        }

        public function reasigna(){
            $this->palo=$this->palo->reasigna();
            return $this->palo;
        }
    }

    $micarta=new Carta(3, Palos::Picas);
    echo $micarta->getPalo()."<br>";
    echo $micarta->getPaloTXT()."<br>";
    $micarta->reasigna();
    echo $micarta->getPaloTXT()."<br>";

    class Singleton{
        private static ?Singleton $instancia = null;
        private function __construct(){}

        public static function getSingletonInstance():Singleton{
            self::$instancia=new Singleton;
            return self::$instancia;
        } 
    }

    $misisngleton= Singleton::getSingletonInstance();
    var_dump($misisngleton);
?>