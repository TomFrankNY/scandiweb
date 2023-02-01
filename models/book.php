<?php

require_once 'Product.php';
require_once '../Database.php';

class Book extends Product {
    public $weight;
   
        public function __construct($properties) {
            parent::__construct($properties['sku'], $properties['name'], $properties['price'], $properties['productType']);
            $this->weight = $properties['weight'];
    }

    public function save() 
    {
        $db = Database::getInstance();   
        $properties = parent::save();
        $properties['weight'] = $this->weight;
        $db->addBook($properties); 
    }
}