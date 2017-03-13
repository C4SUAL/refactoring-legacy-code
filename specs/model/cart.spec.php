<?php

describe('Cart', function () {
    beforeEach(function () {
        $this->productRepository = $this->getProphet()->prophesize(\App\Model\Resource\Product::class);
    });
    describe('->addProduct', function () {
        it('should add a new Product to the cart item', function () {
            $product = new \App\Model\Product();
            $product->setId(1);
            $cart = new \App\Model\Cart($this->productRepository->reveal());

            $this->productRepository->load(new \App\Model\Product(), 1)->willReturn($product);

            $actual = count($cart->getItems());
            expect($actual)->to->be->empty();

            $cart->addProduct(1);

            $actual = count($cart->getItems());
            expect($actual)->to->equal(1);
            expect($cart->getItems()[0])->to->equal($product);
        });

        it('should not add a Product if it already exists by ID', function () {

        });
    });
    describe('->removeProduct', function () {

    });
    describe('->truncate', function () {

    });
});