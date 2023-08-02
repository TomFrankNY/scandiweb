<?php

require_once 'Product.php';
require_once __DIR__.'/../Database.php';

class Dvd extends Product
{
    private $size;

    public function __construct($properties)
    {
        parent::__construct($properties['sku'], $properties['name'], $properties['price'], $properties['productType']);
        $this->size = $properties['size'];
    }

    public function save()
    { 
        $db = Database::getInstance();   
        $properties = parent::save();
        $properties['size'] = $this->size;
        $db->addDvd($properties); 
    }
} 



// whereas / as opposed to / while / compared to 