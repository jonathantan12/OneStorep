<?php

class Inventory {
    private $product_id;
    private $account_id;
    private $product_name;
    private $product_brand;
    private $product_type;
    private $product_colour;
    private $product_size;
    private $product_weight;
    private $product_dimension;
    private $stored_date;
    private $arranged_date;
    private $sent_date;
    private $status;

    public function __construct($product_id, $account_id, $product_name, $product_brand ,$product_type, $product_colour, $product_size, $product_weight ,$product_dimension, $stored_date, $arranged_date, $sent_date, $status) {
        $this->product_id = $product_id;
        $this->account_id = $account_id;
        $this->product_name = $product_name;
        $this->product_brand = $product_brand;
        $this->product_type = $product_type;
        $this->product_colour = $product_colour;
        $this->product_size = $product_size;
        $this->product_weight = $product_weight;
        $this->product_dimension = $product_dimension;
        $this->stored_date = $stored_date;
        $this->arranged_date = $arranged_date;
        $this->sent_date = $sent_date;
        $this->status = $status;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getAccountId() {
        return $this->account_id;
    }
    public function getProductName() {
        return $this->product_name;
    }
    public function getProductBrand() {
        return $this->product_brand;
    }
    public function getProductType() {
        return $this->product_type;
    }
    public function getProductColour() {
        return $this->product_colour;
    }
    public function getProductSize() {
        return $this->product_size;
    }
    public function getProductWeight() {
        return $this->product_weight;
    }
    public function getProductDimension() {
        return $this->product_dimension;
    }
    public function getStoredDate() {
        return $this->stored_date;
    }
    public function getArrangedDate() {
        return $this->arranged_date;
    }
    public function getSentDate() {
        return $this->sent_date;
    }
    public function getStatus() {
        return $this->status;
    }


}

?>