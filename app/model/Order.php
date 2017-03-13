<?php

class Order extends ModelAbstract {

    protected $resourceName = '\App\Model\Resource\Product';

    public function save()
    {
        $this->getResource()->save($this);
    }

    public function sendConfirmation()
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset: utf-8' . "\r\n";
        $headers .= 'From: sales@alanmitchellweb.com';

        $to = $this->getEmail();
        $subject = 'New order from alanmitchellweb.com';

        $app = \Slim\Slim::getInstance();
        $view = new \Slim\Slim\View();
        $body = $view->render('email/new_order.twig', [
            'order' => $order
        ]);

        mail($to, $subject, $body, $headers);
    }
}
