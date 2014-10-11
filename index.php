<?php
set_include_path(get_include_path()
    .PATH_SEPARATOR.'classes'
    .PATH_SEPARATOR.'classes/calculator'
    .PATH_SEPARATOR.'classes/product'
    .PATH_SEPARATOR.'classes/order'
    .PATH_SEPARATOR.'classes/discount'
);

function auto($class) {
    require_once $class.'.php';
}

spl_autoload_register('auto');

try
{
    $productA = Product::createProduct(ProductEnum::ProductA,100);
    $productB = Product::createProduct(ProductEnum::ProductB,200);
    $productC = Product::createProduct(ProductEnum::ProductC,300);
    $productD = Product::createProduct(ProductEnum::ProductD,400);
    $productE = Product::createProduct(ProductEnum::ProductE,500);

    $productC1 = Product::createProduct(ProductEnum::ProductC,50);
    $productC2 = Product::createProduct(ProductEnum::ProductC,50);
    $productC3 = Product::createProduct(ProductEnum::ProductC,60);

    $discount1 = new DiscountProductSet();
    $discount1->setProductSet2($productA,$productB);
    $discount1->setDiscount(10);

    $discount2 = new DiscountProductSet();
    $discount2->setProductSet2($productD,$productE);
    $discount2->setDiscount(5);

    $discount3 = new DiscountProductSet();
    $discount3->setProductSet3($productC1,$productC2,$productC3);
    $discount3->setDiscount(5);

    $productOrder = new Order();
    $productOrder->push($productA);
    $productOrder->push($productB);
    $productOrder->push($productC);
    $productOrder->push($productD);
    $productOrder->push($productE);
    $productOrder->push($productC1);
    $productOrder->push($productC2);
    $productOrder->push($productC3);

    $discountManager = new DiscountManager();
    $discountManager->add($discount1);
    $discountManager->add($discount2);
    $discountManager->add($discount3);

    $calculator = new Calculator();
    $calculator->setDiscountManager($discountManager);
    $calculator->setOrder($productOrder);
	
    echo $calculator->doCalculation();

}
catch (ProductException $e)
{
    echo $e->getMessage();
}
catch (DiscountSetException $e)
{
    echo $e->getMessage();
}
catch (Exception $e)
{
    echo $e->getMessage();
}