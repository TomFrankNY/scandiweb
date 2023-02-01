<?php

abstract class Product {
    
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;

    public function __construct($sku, $name, $price, $productType) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }
    
    // public function getSku() {
    //     return $this->sku;
    // }

    // public function getName() {
    //     return $this->name;
    // }

    // public function getPrice() {
    //     return $this->price;
    // }
    public function save()
    {   
        $db = Database::getInstance();   
        $properties = [];
        $properties['sku'] = $this->sku;
        $properties['name'] = $this->name;
        $properties['price'] = $this->price;
        $properties['productType'] = $this->productType;
        $properties['productId'] = $db->addProduct($properties); 
        return $properties;
    }
}
