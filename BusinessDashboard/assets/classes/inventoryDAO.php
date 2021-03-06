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
            $result[] = new Inventory($row['product_id'], $row['account_id'], $row['product_name'], $row['product_brand'] ,$row['product_type']
            , $row['product_colour'], $row['product_size'], $row['product_weight'], $row['product_dimension'], $row['stored_date'], $row['arranged_date']
            , $row['sent_date'], $row['status']);
        }
        $stmt = null;
        $pdo = null;
        
        return $result;
    }

    public function getItemInfo($product_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = 'select * from inventory where product_id=:product_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->execute();
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Inventory($row['product_id'], $row['account_id'], $row['product_name'], $row['product_brand'] ,$row['product_type']
            , $row['product_colour'], $row['product_size'], $row['product_weight'], $row['product_dimension'], $row['stored_date'], $row['arranged_date']
            , $row['sent_date'], $row['status']);
        }
        $stmt = null;
        $pdo = null;
        
        return $result;
    }
}

?>