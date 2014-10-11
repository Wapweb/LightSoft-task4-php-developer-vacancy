<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 1:26
 */

class DiscountManager {
    private $_discounts = array();

    public function __construct(){}

    public function add(DiscountProductSet $discount)
    {
        $this->_discounts[] = $discount;
    }

    /**
     * @return DiscountProductSet[]
     */
    public function getDiscounts()
    {
        return $this->_discounts;
    }
} 