<?php
use App\Model\Cart;

// Category page
$app->get('/cart', function () use ($app) {

    $cart = new Cart;
    $cart->load();

    // Render index view
    $app->render('cart/view.twig', [
        'cart' => $cart
    ]);
});

$app->post('/cart/add/:id', function ($id) use ($app) {

    $cart = new Cart;
    $cart->load();

    $cart->addProduct($id);
    $cart->save();

    $app->redirect('/cart');
});

$app->get('/cart/remove/:id', function ($id) use ($app) {

    $cart = new Cart;
    $cart->load();

    $cart->removeProduct($id);
    $cart->save();

    $app->redirect('/cart');
});
