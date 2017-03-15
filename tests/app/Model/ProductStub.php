<?php


namespace Tests\App\Model;

use App\Model\Product;

/**
 * Class ProductStub
 * Although both methods in this class return null, it's not considered a "Dummy" because it extends Product. It's a Fake.
 * @package Tests\App\Model
 */
class ProductStub extends Product
{
    public function getResource()
    {
        return null;
    }

    public function load($id, $col = null)
    {
        return null;
    }

    public function getId()
    {
        return 1;
    }
}