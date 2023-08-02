<?php

require_once 'Product.php';
require_once __DIR__.'/../Database.php';

class Furniture extends Product {
    private $length;
    private $height;
    private $width;

    public function __construct($properties) {
        parent::__construct($properties['sku'], $properties['name'], $properties['price'], $properties['productType']);
        $this->length = $properties['length'];
        $this->height = $properties['height'];
        $this->width = $properties['width'];
    }
    
        public function save() 
        {
            $db = Database::getInstance();   
            $properties = parent::save();
            $properties['length'] = $this->length;
            $properties['height'] = $this->height;
            $properties['width'] = $this->width;
            $db->addFurniture($properties); 
        }
    }