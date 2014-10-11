<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 19:56
 */

class CalculatorProductSet3 implements ICalculatorProductSetStrategy  {
    const COUNT = 3;
    private $_deny = [ProductEnum::ProductA,ProductEnum::ProductC];

    public function getSum(array $products, DiscountProductSet $discount, Order $order)
    {
        $currentType = null;
        $count = 0;
        $sum = 0;

        /** @var Product $product */
        foreach($products as $product)
        {
            if($product->isCalculate() == false && !in_array($product->getProductType(),$this->_deny))
            {
                $count++;
            }
            $sum += $order->getProducts()[$product->getId()]->isCalculate() == false ? $product->getPrice() : 0;
            $order->getProducts()[$product->getId()]->setIsCalculate();
        }

        if($count == CalculatorProductSet3::COUNT)
        {
            return $sum*(1-$discount->getDiscount()/100);
        }

        return $sum;
    }
} 