<?php

describe('Cart', function () {
    beforeEach(function () {
        $this->productRepository = $this->getProphet()->prophesize(\App\Model\Resource\Product::class);
    });
    describe('->addProduct', function () {
        it('should add a new Product to the cart item', function () {
            // We use a test double known as a Fake because it extends the real Cart object but overrides the getProduct() method to return a ProductStub double of our creation.
            $cart = new \Tests\App\Model\CartFake();

            $count = count($cart->getItems());
            expect($count)->to->be->empty();

            $cart->addProduct(1);

            $count = count($cart->getItems());
            expect($count)->to->equal(1);
        });

        it('should not add a Product if it already exists by ID', function () {

        });
    });
    describe('->removeProduct', function () {
        it('should remove a product from the cart', function () {
            $cart = new \Tests\App\Model\CartFake();
            $cart->addProduct(1);
            $cart->addProduct(2);

            $cart->removeProduct(1);

            $count = count($cart->getItems());
            expect($count)->to->equal(1);
            expect($cart->getItems()[0]->id)->to->equal(2);
        });
    });
    describe('->truncate', function () {
        it('should remove all items from the cart', function () {
            $cart = new \Tests\App\Model\CartFake();
            $cart->addProduct(1);
            $cart->addProduct(2);

            $cart->truncate();

            $count = count($cart->getItems());
            expect($count)->to->equal(0);
        });
    });
});