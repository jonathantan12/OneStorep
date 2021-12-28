<?php

class Inventory {
    private $sku;
    private $account_id;
    private $product_name;
    private $product_brand;
    private $product_type;
    private $product_colour;
    private $product_size;
    private $product_weight;
    private $product_dimension;
    private $stored_date;
    private $sent_date;
    private $delivered_date;
    private $status;

    public function __construct($sku, $account_id, $product_name, $product_brand ,$product_type, $product_colour, $product_size, $product_weight ,$product_dimension, $stored_date, $sent_date, $delivered_date, $status) {
        $this->sku = $sku;
        $this->account_id = $account_id;
        $this->product_name = $product_name;
        $this->product_brand = $product_brand;
        $this->type_of_product = $product_type;
        $this->product_colour = $product_colour;
        $this->product_size = $product_size;
        $this->product_weight = $product_weight;
        $this->product_dimension = $product_dimension;
        $this->stored_date = $stored_date;
        $this->sent_date = $sent_date;
        $this->delivered_date = $delivered_date;
        $this->status = $status;
    }

    public function getSku() {
        return $this->sku;
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
    public function getSentDate() {
        return $this->sent_date;
    }
    public function getDeliveredDate() {
        return $this->delivered_date;
    }
    public function getStatus() {
        return $this->status;
    }


}

?>