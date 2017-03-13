<?php

namespace App\Model\Resource;

use PDO;

abstract class ResourceDbAbstract
{
    /**
    *
    */
    protected $tableName;
    protected $primaryKey = 'id';

    public function getReadConnection()
    {
        $app = \Slim\Slim::getInstance();
        return $app->db['default_read'];
    }

    public function getWriteConnection()
    {
        $app = \Slim\Slim::getInstance();
        return $app->db['default_write'];
    }

    public function load(\App\Model\ModelAbstract $object, $id, $col = null)
    {
        if (empty($this->tableName)) {
            throw new Exception('$tableName is not set.');
        }
        if ($col === null) {
            $col = $this->primaryKey;
        }
        $sql = 'SELECT * FROM '.$this->tableName.' WHERE '.$col.' = ?';
        $conn = $this->getReadConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $object->setData($data);
        }
    }
}
