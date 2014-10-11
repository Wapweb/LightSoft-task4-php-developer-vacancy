<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:00
 */

class ProductB extends Product {
    protected $_price;
    protected  $_isCalculate = false;
    protected $_id;

    public function __construct($price,$id)
    {
        $this->_price = abs(floatval($price));
        $this->_id = $id;
        $this->_type = ProductEnum::ProductB;
    }
} 