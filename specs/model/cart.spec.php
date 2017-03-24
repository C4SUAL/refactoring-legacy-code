<?php
use \Prophecy\Argument;

describe('Cart', function () {
    beforeEach(function () {
        $this->productRepository = $this->getProphet()->prophesize(\App\Model\Resource\Product::class);
        $this->cartResource = $this->getProphet()->prophesize(\App\Model\Resource\Cart::class);
    });
    describe('->addProduct', function () {
        it('should add a new Product to the cart item', function () {
            // We use a test double known as a Fake because it extends the real Cart object but overrides the getProduct() method to return a ProductStub double of our creation.
            $cart = new \Tests\App\Model\CartTest();

            $count = count($cart->getItems());
            expect($count)->to->be->empty();

            $cart->addProduct(1);

            $count = count($cart->getItems());
            expect($count)->to->equal(1);
        });

        it('should not add a Product if it already exists by ID', function () {
            $cart = new \Tests\App\Model\CartTest();
            $cart->addProduct(1);
            $cart->addProduct(1);
            $count = count($cart->getItems());
            expect($count)->to->equal(1);
        });
    });
    describe('->removeProduct', function () {
        it('should remove a product from the cart', function () {
            $cart = new \Tests\App\Model\CartTest();
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
            $cart = new \Tests\App\Model\CartTest();
            $cart->addProduct(1);
            $cart->addProduct(2);

            $cart->truncate();

            $count = count($cart->getItems());
            expect($count)->to->equal(0);
        });
    });
    describe('->load()', function () {
        it('should load hydrate the Cart object', function () {
            $cart = new \Tests\App\Model\CartTest();
            $cart->supersedeResource($this->cartResource->reveal());
            $product = new \Tests\App\Model\ProductStub();
            $product->id = 10;
            $this->cartResource
                ->load(Argument::any(), null, null)
                ->will(function ($args) use ($product) {
                    $args[0]->setData([
                        'items' => [$product]
                    ]);
                });

            $cart->load();

            expect(count($cart->getItems()))->to->be->above(0);
            $cartItem = $cart->getItems()[0];
            expect($cartItem)->to->equal($product);
        });
    });
    describe('->setData', function () {
        it('should set data on the Cart object', function () {
            $cart = new \App\Model\Cart();
            $product = new \Tests\App\Model\ProductStub();
            $product->id = 1;
            $data = ['items' => [$product]];

            $cart->setData($data);

            expect($cart->getData())->to->equal($data);
        });
    });
});