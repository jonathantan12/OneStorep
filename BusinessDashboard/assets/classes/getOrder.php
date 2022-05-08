<?php
require_once("order.php");
require_once("connectionManager.php");
require_once('orderDAO.php');

$dao = new OrderDAO();
$product_id = $_GET['account_id'];
// $product_id = '12';
$order = $dao->getOrder($product_id); // error here

$items = [];
foreach ($order as $aOrder) {
    $item["order_id"] = $aOrder->getOrderId();
    $item["account_id"] = $aOrder->getAccountId();
    $item["product_id"] = $aOrder->getProductId();
    $item["product_name"] = $aOrder->getProductName();
    $item["product_brand"] = $aOrder->getProductBrand();
    $item["product_type"] = $aOrder->getProductType();
    $item["product_colour"] = $aOrder->getProductColour();
    $item["product_size"] = $aOrder->getProductSize();
    $item["product_weight"] = $aOrder->getProductWeight();
    $item["product_dimension"] = $aOrder->getProductDimension();
    $item["address1"] = $aOrder->getAddress1();
    $item["address2"] = $aOrder->getAddress2();
    $item["postal_code"] = $aOrder->getPostalCode();
    $item["unit_number"] = $aOrder->getUnitNumber();
    $items[] = $item;
}

// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;

?>