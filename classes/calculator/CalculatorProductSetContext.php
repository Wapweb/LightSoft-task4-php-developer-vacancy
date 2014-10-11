<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 20:33
 */

class CalculatorProductSetContext {
    /** @var  ICalculatorProductSetStrategy $_strategy */
    private $_strategy;

    public function __construct(ICalculatorProductSetStrategy $strategy)
    {
        $this->_strategy = $strategy;
    }

    public function getSum(array $products,DiscountProductSet $discount, Order $order) {
        return $this->_strategy->getSum($products,$discount, $order);
    }
} 