<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 19:55
 */

interface ICalculatorProductSetStrategy {

    function getSum(array $products,DiscountProductSet $discount,Order $order);
} 