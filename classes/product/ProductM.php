<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:00
 */

class ProductM extends Product {

    public function __construct($price,$id)
    {
        $this->_price = abs(floatval($price));
        $this->_id = $id;
        $this->_type = ProductEnum::ProductM;
    }
} 