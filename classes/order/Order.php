<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:50
 */

class Order {
    private $_bag = array();

    public function __construct(){}

    public function push(Product $product)
    {
        $this->_bag[$product->getId()] = $product;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->_bag;
    }
} 