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
    $item["address1"] = $aOrder->getAddress1();
    $item["address2"] = $aOrder->getAddress2();
    $item["postal_code"] = $aOrder->getPostalCode();
    $item["unit_number"] = $aOrder->getUnitNumber();
    $item["customer_name"] = $aOrder->getCustomerName();
    $item["customer_contact"] = $aOrder->getCustomerContact();
    $items[] = $item;
}

// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;

?>