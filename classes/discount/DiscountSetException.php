<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:44
 */

class DiscountSetException extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
} 