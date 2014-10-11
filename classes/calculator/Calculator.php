<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 1:28
 */

class Calculator {
    /** @var DiscountManager $_discountManager */
    private $_discountManager;

    /** @var Order $_order */
    private $_order;

    /** @var  integer $_sum */
    private $_sum;

    public function __construct(){}

    public function setOrder(Order $order)
    {
        $this->_order = $order;
    }

    public function setDiscountManager(DiscountManager $discountManager)
    {
        $this->_discountManager = $discountManager;
    }

    public function doCalculation()
    {
        if($this->_discountManager == null || $this->_order == null)
        {
            throw new CalculatorException("Order and DiscountManager must be set");
        }



        if(count($this->_discountManager->getDiscounts()))
        {
            /** @var DiscountProductSet  $discount */
            foreach($this->_discountManager->getDiscounts() as $discount)
            {
                $productSet = $discount->getProductSet();
                switch($discount->getDiscountProductSetType())
                {
                    case DiscountProductSetEnum::ProductSet2 :
                        $calculatorProductSetContextAB = new CalculatorProductSetContext(new CalculatorProductSet2AB());
                        $calculatorProductSetContextDE = new CalculatorProductSetContext(new CalculatorProductSet2DE());
                        $calculatorProductSetContextAK = new CalculatorProductSetContext(new CalculatorProductSet2AK());
                        $calculatorProductSetContextAL = new CalculatorProductSetContext(new CalculatorProductSet2AL());
                        $calculatorProductSetContextAM = new CalculatorProductSetContext(new CalculatorProductSet2AM());
                        $this->_sum += $calculatorProductSetContextAB->getSum($productSet,$discount,$this->_order);
                        $this->_sum += $calculatorProductSetContextDE->getSum($productSet,$discount,$this->_order);
                        $this->_sum += $calculatorProductSetContextAK->getSum($productSet,$discount,$this->_order);
                        $this->_sum += $calculatorProductSetContextAL->getSum($productSet,$discount,$this->_order);
                        $this->_sum += $calculatorProductSetContextAM->getSum($productSet,$discount,$this->_order);
                        break;
                    case DiscountProductSetEnum::ProductSet3 :
                        $calculatorProductSet3Context = new CalculatorProductSetContext(new CalculatorProductSet3());
                        $this->_sum += $calculatorProductSet3Context->getSum($productSet,$discount,$this->_order);
                        break;
                    case DiscountProductSetEnum::ProductSet4 :
                        $calculatorProductSet4Context = new CalculatorProductSetContext(new CalculatorProductSet4());
                        $this->_sum += $calculatorProductSet4Context->getSum($productSet,$discount,$this->_order);
                        break;
                    case DiscountProductSetEnum::ProductSet5 :
                        $calculatorProductSet5Context = new CalculatorProductSetContext(new CalculatorProductSet5());
                        $this->_sum += $calculatorProductSet5Context->getSum($productSet,$discount,$this->_order);
                        break;
                }
            }
        }

        /** @var Product $product */
        foreach($this->_order->getProducts() as $product)
        {
            if($product->isCalculate() == false)
            {
                $this->_sum+= $product->getPrice();
                $this->_order->getProducts()[$product->getId()]->setIsCalculate();
            }
        }

        return $this->_sum;
    }
} 