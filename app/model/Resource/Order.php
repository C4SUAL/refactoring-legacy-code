<?php

namespace App\Model\Resource;

use PDO;

class Order extends ResourceDbAbstract
{
    protected $tableName = 'orders';

    public function save()
    {
        // TODO:
        // Save order to database.
    }
}
