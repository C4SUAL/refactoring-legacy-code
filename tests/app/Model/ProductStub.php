<?php

namespace Tests\App\Model;

use App\Model\ModelInterface;

/**
 * Class ProductStub
 * Whilst load() returns null, getId() returns a constant so this class is a stub.
 * @package Tests\App\Model
 */
class ProductStub implements ModelInterface
{
    public function load($id, $col = null)
    {
        return null;
    }

    public function getId()
    {
        return 1;
    }
}