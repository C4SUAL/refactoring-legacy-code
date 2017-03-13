<?php
namespace App\Model;

class Cart extends ModelAbstract
{

    protected $resourceName = '\App\Model\Resource\Cart';

    /**
    *
    */
    protected $items = array();

    public function load($id = null)
    {
        $this->getResource()->load($this, $id);
    }

    public function save()
    {
        $this->getResource()->save($this);
    }

    public function addProduct($id)
    {
        // Check if it's not already in the Cart

        // Otherwise add to session[cart][items]
        $found = false;
        if ($this->hasItems()) {
            foreach($this->getItems() as $item) {
                if ($item->id == $id) {
                    $found = true;
                }
            }
        }

        if (!$found) {
            $product = new \App\Model\Product;
            $product->load($id);
            if ($product->getId()) {
                $items = $this->getItems();
                $items[] = $product;
                $this->setItems($items);
            }
        }
    }

    public function removeProduct($id)
    {
        if ($this->hasItems()) {
            $items = [];
            foreach($this->getItems() as $item) {
                if ($item->getId() !== $id) {
                    $items[] = $item;
                }
            }
            $this->setItems($items);
        }
    }

    public function truncate() {
        $this->setItems([]);
    }
}
