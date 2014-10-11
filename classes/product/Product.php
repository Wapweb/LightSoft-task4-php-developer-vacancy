<?php
/**
 * Created by PhpStorm.
 * User: Шаповал
 * Date: 26.09.14
 * Time: 23:52
 */

abstract class Product {
    protected  $_price;
    protected $_id;
    protected  $_isCalculate = false;
    protected $_type;
    abstract protected function __construct($price,$id);

    private static $_currentId = 0;

    static function createProduct($type,$price){
        /** @var Product $p */
        $p = null;
        static::$_currentId++;

        switch($type)
        {
           case ProductEnum::ProductA :
               $p = new ProductA($price, static::$_currentId);
               break;
           case ProductEnum::ProductB :
               $p = new ProductB($price, static::$_currentId);
               break;
           case ProductEnum::ProductC :
               $p = new ProductC($price, static::$_currentId);
               break;
           case ProductEnum::ProductD :
               $p = new ProductD($price, static::$_currentId);
               break;
            case ProductEnum::ProductE :
                $p = new ProductE($price, static::$_currentId);
                break;
           case ProductEnum::ProductF :
               $p = new ProductF($price, static::$_currentId);
               break;
           case ProductEnum::ProductG :
               $p = new ProductG($price, static::$_currentId);
               break;
           case ProductEnum::ProductH :
               $p = new ProductH($price, static::$_currentId);
               break;
           case ProductEnum::ProductI :
               $p = new ProductI($price, static::$_currentId);
               break;
           case ProductEnum::ProductJ :
                $p = new ProductJ($price, static::$_currentId);
                break;
           case ProductEnum::ProductK :
                $p = new ProductK($price, static::$_currentId);
                break;
           case ProductEnum::ProductL :
                $p = new ProductL($price, static::$_currentId);
                break;
           case ProductEnum::ProductM :
                $p = new ProductM($price, static::$_currentId);
                break;
           default:
               throw new ProductException();
        }

        return $p;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function setIsCalculate($b = true)
    {
        $this->_isCalculate = $b == true ? true : false;
    }

    public function isCalculate()
    {
        return $this->_isCalculate;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getProductType()
    {
        return $this->_type;
    }
} 