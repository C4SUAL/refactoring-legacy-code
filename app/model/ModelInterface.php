<?php
namespace App\Model;

interface ModelInterface
{
    public function getResource();

    public function load($id, $col = null);
}