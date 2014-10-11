<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 20:55
 */

class CalculatorProductSet2AL implements ICalculatorProductSetStrategy {
    private $_allow = [ProductEnum::ProductA,ProductEnum::ProductL];

    public function getSum(array $products, DiscountProductSet $discount, Order $order)
    {
        $currentType = null;
        $sum = 0;

        /** @var Product $product */
        foreach($products as $product)
        {
            if(in_array($product->getProductType(),$this->_allow) && $order->getProducts()[$product->getId()]->isCalculate() == false)
            {
                $key = array_keys($this->_allow,$product->getProductType())[0];
                unset($this->_allow[$key]);
            }

            $sum += $order->getProducts()[$product->getId()]->isCalculate() == false ? $product->getPrice() : 0;
        }

        if(count($this->_allow) == 0)
        {
            foreach($products as $product) $product->setIsCalculate();

            return $sum*(1-$discount->getDiscount()/100);
        }
        else
        {
            return 0;
        }
    }
} 