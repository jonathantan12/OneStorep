<?php
require_once("inventory.php");
require_once("connectionManager.php");

class InventoryDAO {
    public function getInventory($account_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = 'select * from inventory where account_id=:account_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
        $stmt->execute();
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Inventory($row['sku'], $row['account_id'], $row['product_name'], $row['product_brand'] ,$row['product_type']
            , $row['product_colour'], $row['product_size'], $row['product_weight'], $row['product_dimension'], $row['stored_date'], $row['sent_date']
            , $row['delivered_date'], $row['status']);
        }
        $stmt = null;
        $pdo = null;
        
        return $result;
    }
}

$dao = new InventoryDAO();
$account_id = 2;
// var_dump($itemname);
$products = $dao->getInventory($account_id);
// var_dump($products);

$items = [];
foreach ( $products as $aProduct ) {
    $item["sku"] = $aProduct->getSku();
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