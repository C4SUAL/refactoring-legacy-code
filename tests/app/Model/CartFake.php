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
        return new ProductStub();
    }
}