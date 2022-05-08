<?php

class Order {
    private $order_id;
    private $account_id;
    private $product_id;
    private $product_name;
    private $product_brand;
    private $product_type;
    private $product_colour;
    private $product_size;
    private $product_weight;
    private $product_dimension;
    private $address1;
    private $address2;
    private $postal_code;
    private $unit_number;

    public function __construct($order_id, $account_id, $product_id, $product_name, $product_brand ,$product_type, $product_colour, $product_size, $product_weight ,$product_dimension, $address1, $address2, $postal_code, $unit_number) {
        $this->order_id = $order_id;
        $this->account_id = $account_id;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_brand = $product_brand;
        $this->product_type = $product_type;
        $this->product_colour = $product_colour;
        $this->product_size = $product_size;
        $this->product_weight = $product_weight;
        $this->product_dimension = $product_dimension;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->postal_code = $postal_code;
        $this->unit_number = $unit_number;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function getAccountId() {
        return $this->account_id;
    }

    public function getProductId() {
        return $this->product_id;
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
    public function getAddress1() {
        return $this->address1;
    }
    public function getAddress2() {
        return $this->address2;
    }
    public function getPostalCode() {
        return $this->postal_code;
    }
    public function getUnitNumber() {
        return $this->unit_number;
    }

}

?>