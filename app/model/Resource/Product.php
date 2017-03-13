<?php

namespace App\Model\Resource;

use PDO;

class Product extends ResourceDbAbstract
{
    protected $tableName = 'products';

    public function getCollection()
    {
        $sql = 'SELECT id, name, url, image, price
                  FROM '.$this->tableName.'
                 WHERE enabled = 1';
        $conn = $this->getReadConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $collection = [];
        while(false !== ($data = $stmt->fetch(PDO::FETCH_ASSOC))) {
            $collection[] = (new \App\Model\Product)->setData($data);
        }

        return $collection;
    }
}
