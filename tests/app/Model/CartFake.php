<?php
namespace Tests\App\Model;

use App\Model\Cart;

class CartFake extends Cart
{
    /**
     * @return ProductStub
     */
    public function getProduct()
    {
        $productStub = new ProductStub();
        $productStub->setId(1);
        $productStub->setName('Demo product');
        return $productStub;
    }
}