<?php
use App\Model\Cart;
use App\Model\Checkout;

// Category page
$app->get('/checkout', function () use ($app) {

    $cart = new Cart;
    $cart->load();

    $order = new Order;
    $order->setItems($cart->getItems());
    $order->setEmail($app->request->post('email');
    if ($order->save()) {
        $order->sendConfirmation();
    }

    // Render index view
    $app->render('cart/view.twig', [
        'cart' => $cart
    ]);
});
