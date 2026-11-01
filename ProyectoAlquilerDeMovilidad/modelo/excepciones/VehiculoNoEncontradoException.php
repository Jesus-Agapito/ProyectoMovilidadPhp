<?php
namespace Dwes\AlquilerMovilidad\Util;

use Throwable;

require_once 'AlquilerMovilidadException.php';

class VehiculoNoEncontradoException extends AlquilerMovilidadException {
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }
}