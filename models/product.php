<?php

abstract class Product
{

    protected $sku;
    protected $name;
    protected $price;
    protected $productType;

    public function __construct($sku, $name, $price, $productType)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }

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

    public function check()
    {
        $sku = ($_POST['sku']);
        $db = Database::getInstance();
        $result = $db->checkSku($sku);
        // $sku = 2;
        // // $newVar = $db->checkSku($sku);
        // // echo $sku." caca";
        // // $checkProduct = "SELECT sku FROM products WHERE sku='$sku'";
        // // $check = $this->mysqli->query($checkProduct);
        if (mysqli_num_rows($result) > 0) {
            echo 'SKU_EXISTS';
        } else {
            echo 'SKU_AVAILABLE';
        }
    }

    //     {

    // $sku = ($_POST['sku']);
    // $db = Database::getInstance();
    // $newVar = $db->checkSku($sku);
    // // echo $sku." caca";
    // $checkProduct = "SELECT sku FROM products WHERE sku='$sku'";
    // $check = $this->mysqli->query($checkProduct);
    // if (mysqli_num_rows($check) > 0) 
    //    {
    //     echo 'SKU_EXISTS';
    //    }
    // else{
    //     echo 'SKU_AVAILABLE';
    // }
    //     }

}
