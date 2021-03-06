<?php
namespace Tests\App\Model;

use App\Model\Cart;

class CartTest extends Cart
{
    /**
     * @return ProductStub
     */
    public function getProduct()
    {
        return new ProductStub();
    }

    public function supersedeResource($resource)
    {
        $this->resource = $resource;
    }
}