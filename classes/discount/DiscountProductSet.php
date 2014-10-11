<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 27.09.14
 * Time: 0:32
 */

class DiscountProductSet {
    private $_productSet = [];
    private $_discount;
    private $_type = DiscountProductSetEnum::ProductSet2;

    public function __construct(){}

    public function setProductSet2(Product $p1, Product $p2)
    {
        $this->_check();

        $this->_productSet = [$p1,$p2];
    }

    public function setProductSet3(Product $p1, Product $p2, Product $p3)
    {
        $this->_check();

        $this->_productSet = [$p1,$p2,$p3];
        $this->_type = DiscountProductSetEnum::ProductSet3;
    }

    public function setProductSet4(Product $p1, Product $p2, Product $p3, Product $p4)
    {
        $this->_check();

        $this->_productSet = [$p1,$p2,$p3,$p4];
        $this->_type = DiscountProductSetEnum::ProductSet4;
    }

    public function setProductSet5(Product $p1,Product $p2,Product $p3, Product $p4, Product $p5)
    {
        $this->_check();

        $this->_productSet = [$p1,$p2,$p3,$p4,$p5];
        $this->_type = DiscountProductSetEnum::ProductSet5;
    }

    public function setDiscount($discount)
    {
        $discount = abs(intval($discount));
        if($discount > 100 || $discount <= 0)
        {
            throw new DiscountSetException("Invalid discount value (must by less than 100 and greater than 0)");
        }

        $this->_discount = $discount;
    }

    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @return Product[]
     */
    public function getProductSet()
    {
        return $this->_productSet;
    }

    public function getDiscountProductSetType()
    {
        return $this->_type;
    }

    private function _check()
    {
        if(count($this->_productSet) > 0)
        {
            throw new DiscountSetException("ProductSet is already set");
        }

    }
} 