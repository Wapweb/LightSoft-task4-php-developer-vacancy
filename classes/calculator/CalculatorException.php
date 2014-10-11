<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 1:31
 */

class CalculatorException extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
} 