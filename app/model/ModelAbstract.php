<?php

namespace App\Model;

class ModelAbstract extends \Varien_Object implements ModelInterface
{

    /**
    * Name of \App\Model\Resource
    */
    protected $resourceName;

    /**
    * Instance of \App\Model\Resource
    */
    protected $resource;

    public function getResource()
    {
        if (null === $this->resource) {
            if (empty($this->resourceName)) {
                throw new Exception('$tableName is not set.');
            }
            $this->resource = new $this->resourceName;
        }
        return $this->resource;
    }

    public function load($id, $col = null)
    {
        $this->getResource()->load($this, $id, $col);
    }
}
