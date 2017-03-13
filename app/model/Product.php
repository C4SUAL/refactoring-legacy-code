<?php

namespace App\Model;

class Product extends ModelAbstract
{

    protected $resourceName = '\App\Model\Resource\Product';

    public function getCollection()
    {
        return $this->getResource()->getCollection();
    }

    public function formatPrice()
    {
        return "&pound;". number_format($this->price, 2, '.', ',');
    }

    public function getProductUrl()
    {
        return '/product/'.$this->url;
    }
}
