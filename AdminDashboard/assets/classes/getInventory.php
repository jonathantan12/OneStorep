<?php
require_once("inventory.php");
require_once("connectionManager.php");
require_once('inventoryDAO.php');

$dao = new InventoryDAO();
$account_id = $_GET['account_id'];
// var_dump($account_id);
$account_id = (int)$account_id;
// var_dump($account_id);
$products = $dao->getInventory($account_id);
// var_dump($products);

$items = [];
foreach ( $products as $aProduct ) {
    $item["product_id"] = $aProduct->getProductId();
    $item["account_id"] = $aProduct->getAccountId();
    $item["product_name"] = $aProduct->getProductName();
    $item["product_brand"] = $aProduct->getProductBrand();
    $item["product_type"] = $aProduct->getProductType();
    $item["product_colour"] = $aProduct->getProductColour();
    $item["product_size"] = $aProduct->getProductSize();
    $item["product_weight"] = $aProduct->getProductWeight();
    $item["product_dimension"] = $aProduct->getProductDimension();
    $item["stored_date"] = $aProduct->getStoredDate();
    $item["sent_date"] = $aProduct->getSentDate();
    $item["delivered_date"] = $aProduct->getDeliveredDate();
    $item["status"] = $aProduct->getStatus();
    $items[] = $item;
}

// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;

?>