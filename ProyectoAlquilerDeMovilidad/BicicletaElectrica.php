<?php

require_once "Vehiculo.php";

class BicicletaElectrica extends Vehiculo{
    public function __construct(
        string     $titulo,
        int        $numero,
        float      $precio,
        public int $marcha,
        public string $tipo
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }


    public function muestraResumen(): void
    {
        parent::muestraResumen();

        echo " Marcha: " . $this->marcha;
        echo " Es de tipo: " . $this->tipo;
    }
}