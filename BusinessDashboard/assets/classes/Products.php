<?php

class Inventory {
    private $product_id;
    private $product_name;
    private $product_desc;
    private $type;
    private $colour;
    private $price;
    private $image;

    public function __construct($product_id, $product_name, $product_desc, $type ,$colour, $price, $image) {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_desc = $product_desc;
        $this->product_type = $type;
        $this->colour = $colour;
        $this->price = $price;
        $this->image = $image;
    }

    public function getProductId() {
        return $this->product_id;
    }
    public function getProductName() {
        return $this->product_name;
    }
    public function getProductDesc() {
        return $this->product_desc;
    }
    public function getType() {
        return $this->type;
    }
    public function getColour() {
        return $this->colour;
    }
    // public function getSize() {
    //     return $this->size;
    // }
    public function getPrice() {
        return $this->price;
    }
    public function getImage() {
        return $this->image;
    }

}

?>