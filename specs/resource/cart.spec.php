<?php
use \Prophecy\Argument;

describe('Resource\Cart', function () {
    beforeEach(function () {
        $this->cart = $this->getProphet()->prophesize(\App\Model\Cart::class);
    });
    it('should start a session', function () {
        expect(session_id())->to->be->empty('session should not be started');

        new \App\Model\Resource\Cart();

        expect(session_id())->to->not->be->empty('session id should return a valid session id');
    });
    describe('->load', function () {
        it('should load data from the user\'s session', function () {
            $cartResource = new \App\Model\Resource\Cart();

            $product1 = new \Tests\App\Model\ProductStub();
            $product1->id = 1;
            $product2 = new \Tests\App\Model\ProductStub();
            $product2->id = 2;

            $_SESSION['cart'] = [];

            $this->cart->setData(Argument::type('array'))->shouldBeCalled();

            $cartResource->load($this->cart->reveal());

            $this->getProphet()->checkPredictions();
        });
    });
    describe('->save', function () {
        it('should save the Cart object to the session', function () {
            $cartResource = new \App\Model\Resource\Cart();

            $data = ['items' => []];
            $this->cart->getData()->shouldBeCalled()->willReturn($data);

            $cartResource->save($this->cart->reveal());

            expect($_SESSION['cart'])->to->equal($data);

            $this->getProphet()->checkPredictions();
        });
    });
});