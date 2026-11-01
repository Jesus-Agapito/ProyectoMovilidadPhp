<?php
namespace Dwes\AlquilerMovilidad\Util;

use Exception;
use Throwable;


class AlquilerMovilidadException extends Exception {
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }
}