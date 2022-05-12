<?php

class multipleOrder {
    private $order_id;
    private $account_id;
    private $product_name1;
    private $product_quantity1;
    private $product_name2;
    private $product_quantity2;
    private $product_name3;
    private $product_quantity3;
    private $product_name4;
    private $product_quantity4;
    private $product_name5;
    private $product_quantity5;
    private $address1;
    private $address2;
    private $postal_code;
    private $unit_number;
    private $customer_name;
    private $customer_contact;
    private $order_status;
    private $arranged_date;
    private $sent_date;

    public function __construct($order_id, $account_id, $product_name1, $product_quantity1, $product_name2 ,
    $product_quantity2, $product_name3, $product_quantity3, $product_name4 ,$product_quantity4, $product_name5, $product_quantity5, 
    $address1, $address2, $postal_code, $unit_number, $customer_name, $customer_contact, $order_status, $arranged_date, $sent_date) {
        $this->order_id = $order_id;
        $this->account_id = $account_id;
        $this->product_name1 = $product_name1;
        $this->product_quantity1 = $product_quantity1;
        $this->product_name2 = $product_name2;
        $this->product_quantity2 = $product_quantity2;
        $this->product_name3 = $product_name3;
        $this->product_quantity3 = $product_quantity3;
        $this->product_name4 = $product_name4;
        $this->product_quantity4 = $product_quantity4;
        $this->product_name5 = $product_name5;
        $this->product_quantity5 = $product_quantity5;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->postal_code = $postal_code;
        $this->unit_number = $unit_number;
        $this->customer_name = $customer_name;
        $this->customer_contact = $customer_contact;
        $this->order_status = $order_status;
        $this->arranged_date = $arranged_date;
        $this->sent_date = $sent_date;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function getAccountId() {
        return $this->account_id;
    }

    public function getProductName1() {
        return $this->product_name1;
    }

    public function getProductQuantity1() {
        return $this->product_quantity1;
    }
    public function getProductName2() {
        return $this->product_name2;
    }
    public function getProductQuantity2() {
        return $this->product_quantity2;
    }
    public function getProductName3() {
        return $this->product_name3;
    }
    public function getProductQuantity3() {
        return $this->product_quantity3;
    }
    public function getProductName4() {
        return $this->product_name4;
    }
    public function getProductQuantity4() {
        return $this->product_quantity4;
    }
    public function getProductName5() {
        return $this->product_name5;
    }
    public function getProductQuantity5() {
        return $this->product_quantity5;
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
    public function getCustomerName() {
        return $this->customer_name;
    }
    public function getCustomerContact() {
        return $this->customer_contact;
    }
    public function getOrderStatus() {
        return $this->order_status;
    }
    public function getArrangedDate() {
        return $this->arranged_date;
    }
    public function getSentDate() {
        return $this->sent_date;
    }

}

?>