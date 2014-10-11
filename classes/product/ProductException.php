<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:17
 */

class ProductException extends  Exception {
    public function __construct($message = "Invalid product type", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
} 