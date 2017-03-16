<?php
namespace App\Model;

interface ModelInterface
{
    public function load($id, $col = null);
}