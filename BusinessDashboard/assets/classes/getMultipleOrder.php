<?php
require_once("multipleOrder.php");
require_once("connectionManager.php");
require_once('multipleOrderDAO.php');

$dao = new multipleOrderDAO();
$account_id = 2;

// $account_id = $_GET['account_id'];
$order = $dao->getOrder($account_id); 

$items = [];
foreach ($order as $aOrder) {
    $item["order_id"] = $aOrder->getOrderId();
    $item["account_id"] = $aOrder->getAccountId();
    $item["product_name1"] = $aOrder->getProductName1();
    $item["product_quantity1"] = $aOrder->getProductQuantity1();
    $item["product_name2"] = $aOrder->getProductName2();
    $item["product_quantity2"] = $aOrder->getProductQuantity2();
    $item["product_name3"] = $aOrder->getProductName3();
    $item["product_quantity3"] = $aOrder->getProductQuantity3();
    $item["product_name4"] = $aOrder->getProductName4();
    $item["product_quantity4"] = $aOrder->getProductQuantity4();
    $item["product_name5"] = $aOrder->getProductName5();
    $item["product_quantity5"] = $aOrder->getProductQuantity5();
    $item["product_name6"] = $aOrder->getProductName6();
    $item["product_quantity6"] = $aOrder->getProductQuantity6();
    $item["product_name7"] = $aOrder->getProductName7();
    $item["product_quantity7"] = $aOrder->getProductQuantity7();
    $item["product_name8"] = $aOrder->getProductName8();
    $item["product_quantity8"] = $aOrder->getProductQuantity8();
    $item["product_name9"] = $aOrder->getProductName9();
    $item["product_quantity9"] = $aOrder->getProductQuantity9();
    $item["product_name10"] = $aOrder->getProductName10();
    $item["product_quantity10"] = $aOrder->getProductQuantity10();
    $item["address1"] = $aOrder->getAddress1();
    $item["address2"] = $aOrder->getAddress2();
    $item["postal_code"] = $aOrder->getPostalCode();
    $item["unit_number"] = $aOrder->getUnitNumber();
    $item["customer_name"] = $aOrder->getCustomerName();
    $item["customer_contact"] = $aOrder->getCustomerContact();
    $item["order_status"] = $aOrder->getOrderStatus();
    $item["arranged_date"] = $aOrder->getArrangedDate();
    $item["sent_date"] = $aOrder->getSentDate();
    $items[] = $item;
}

// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;

?>