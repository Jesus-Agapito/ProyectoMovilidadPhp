<?php
class Persona {
    //Constante --> Atributo de clase(es estático)
    public const string TRATAMIENTO = "D.";

    //Atributo estático
        private static int $contadorPersonas=0;

    //Atributos
//    private string $nombre;
//    private string $apellidos;
//    private int $edad;
//
//    //Constructo --> Solo puede haber un constructor
//    public function __construct(string $nombre, string $apellidos, int $edad){
//        $this->nombre = $nombre;
//        $this->apellidos = $apellidos;
//        $this->edad = $edad;
//    }


    //Constructor a partir de php8 en el que difinimos los atributos
    //De la clase diractamente en los parámetros del mismo
    public function __construct(
        private string $nombre,
        private string $apellidos,
        private int $edad = 0 //Valor por defecto al parámetro $edad
    )
    {
        self::$contadorPersonas++;
    }


    //Métodos

    public function getNombre(): string {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }
    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function getEdad(): int {
        return $this->edad;
    }
    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }



    public function mostrar(): string {
        return " <strong>" . $this->getNombre() . " " . $this->getApellidos() . "</strong> - " . $this->getEdad();
    }

    //Función estática para devolver el atributo estático $contadorPersonas
    public static function getContadorPersonas(){
        return self::$contadorPersonas;
    }
}

