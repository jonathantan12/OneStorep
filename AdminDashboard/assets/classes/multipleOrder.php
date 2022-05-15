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
    private $product_name6;
    private $product_quantity6;
    private $product_name7;
    private $product_quantity7;
    private $product_name8;
    private $product_quantity8;
    private $product_name9;
    private $product_quantity9;
    private $product_name10;
    private $product_quantity10;
    private $address1;
    private $address2;
    private $postal_code;
    private $unit_number;
    private $customer_name;
    private $customer_contact;
    private $order_status;
    private $arranged_date;
    private $sent_date;

    public function __construct($order_id, $account_id, $product_name1, $product_quantity1, $product_name2,
    $product_quantity2, $product_name3, $product_quantity3, $product_name4 ,$product_quantity4, $product_name5, $product_quantity5, 
    $product_name6, $product_quantity6, $product_name7, $product_quantity7, $product_name8, $product_quantity8, $product_name9, $product_quantity9, 
    $product_name10, $product_quantity10, $address1, $address2, $postal_code, $unit_number, $customer_name, $customer_contact, $order_status, 
    $arranged_date, $sent_date) {
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
        $this->product_name6 = $product_name6;
        $this->product_quantity6 = $product_quantity6;
        $this->product_name7 = $product_name7;
        $this->product_quantity7 = $product_quantity7;
        $this->product_name8 = $product_name8;
        $this->product_quantity8 = $product_quantity8;
        $this->product_name9 = $product_name9;
        $this->product_quantity9 = $product_quantity9;
        $this->product_name10 = $product_name10;
        $this->product_quantity10 = $product_quantity10;
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
    public function getProductName6() {
        return $this->product_name6;
    }
    public function getProductQuantity6() {
        return $this->product_quantity6;
    }
    public function getProductName7() {
        return $this->product_name7;
    }
    public function getProductQuantity7() {
        return $this->product_quantity7;
    }
    public function getProductName8() {
        return $this->product_name8;
    }
    public function getProductQuantity8() {
        return $this->product_quantity8;
    }
    public function getProductName9() {
        return $this->product_name9;
    }
    public function getProductQuantity9() {
        return $this->product_quantity9;
    }
    public function getProductName10() {
        return $this->product_name10;
    }
    public function getProductQuantity10() {
        return $this->product_quantity10;
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