<?php
use App\Model\Product;

// Category page
$app->get('/', function () use ($app) {

    $products = (new Product)->getCollection();

    // Render index view
    $app->render('product/list.twig', [
        'products' => $products
    ]);
});

// Product page
$app->get('/product/:url', function ($url) use ($app) {

    $product = new Product;
    $product->load($url, 'url');

    if (null === $product->getId()) {
        $app->notFound();
    }

    // Render index view
    $app->render('product/view.twig', [
        'product' => $product
    ]);
});
