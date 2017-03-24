<?php

namespace App\Model\Resource;

class Cart
{
    public function __construct()
    {
        \App\App::startSession();
    }

    function load($object)
    {
        $data = $_SESSION['cart'];
        if (null !== $data) {
            $object->setData($data);
        }
    }

    function save(\App\Model\Cart $cart)
    {
        $_SESSION['cart'] = $cart->getData();
    }
}
