<?php
require_once("order.php");
require_once("connectionManager.php");

class multipleOrderDAO {
    public function getOrder($account_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT * FROM multiple_orders WHERE account_id=:account_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
        $stmt->execute();

        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new multipleOrder($row['order_id'], $row['account_id'], $row['product_name1'], $row['product_quantity1'], $row['product_name2'] 
            ,$row['product_quantity2'], $row['product_name3'], $row['product_quantity3'], $row['product_name4'], $row['product_quantity4'], $row['product_name5'],
            $row['product_quantity5'], $row['address1'], $row['address2'], $row['postal_code'], $row['unit_number'], $row['customer_name'], $row['customer_contact']);
        }
        $stmt = null;
        $pdo = null;

        return $result;
    }

    public function insertMultipleOrder($account_id, $product_name1, $product_quantity1, $product_name2 ,$product_quantity2, $product_name3, $product_quantity3, $product_name4 ,$product_quantity4, $product_name5, $product_quantity5 ,$address1, $address2, $postal_code, $unit_number, $customer_name, $customer_contact) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "INSERT INTO multiple_orders (account_id, product_name1, product_quantity1, product_name2 ,product_quantity2, product_name3, product_quantity3, product_name4 , product_quantity4, product_name5, product_quantity5 ,address1, address2, postal_code, unit_number, customer_name, customer_contact) 
                VALUES (:account_id, :product_name1, :product_quantity1, :product_name2 , :product_quantity2, :product_name3, :product_quantity3, :product_name4, :product_quantity4, :product_name5, :product_quantity5,:address1, :address2, :postal_code, :unit_number, :customer_name, :customer_contact)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":account_id",$account_id,PDO::PARAM_STR);
        $stmt->bindParam(":product_name1",$product_name1,PDO::PARAM_STR);
        $stmt->bindParam(":product_quantity1",$product_quantity1,PDO::PARAM_STR);
        $stmt->bindParam(":product_name2",$product_name2,PDO::PARAM_STR);
        $stmt->bindParam(":product_quantity2",$product_quantity2,PDO::PARAM_STR);
        $stmt->bindParam(":product_name3",$product_name3,PDO::PARAM_STR);
        $stmt->bindParam(":product_quantity3",$product_quantity3,PDO::PARAM_STR);
        $stmt->bindParam(":product_name4",$product_name4,PDO::PARAM_STR);
        $stmt->bindParam(":product_quantity4",$product_quantity4,PDO::PARAM_STR);
        $stmt->bindParam(":product_name5",$product_name5,PDO::PARAM_STR);
        $stmt->bindParam(":product_quantity5",$product_quantity5,PDO::PARAM_STR);
        $stmt->bindParam(":address1",$address1,PDO::PARAM_STR);
        $stmt->bindParam(":address2",$address2,PDO::PARAM_STR);
        $stmt->bindParam(":postal_code",$postal_code,PDO::PARAM_STR);
        $stmt->bindParam(":unit_number",$unit_number,PDO::PARAM_STR);
        $stmt->bindParam(":customer_name",$customer_name,PDO::PARAM_STR);
        $stmt->bindParam(":customer_contact",$customer_contact,PDO::PARAM_STR);

        $isAddOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isAddOK;
    }

    public function updateInventory($product_name1, $product_quantity1, $product_name2, $product_quantity2, $product_name3, $product_quantity3, 
    $product_name4, $product_quantity4, $product_name4, $product_quantity4) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        date_default_timezone_set("Asia/Singapore");
        $arranged_date = date("Y-m-d");
        $status = 'arranged';
        
        if (!($product_name1 == null)){
            $sql = 'UPDATE inventory SET status=:status, arranged_date=:arranged_date WHERE product_name=:product_name LIMIT :product_quantity1';
            // SELECT * FROM inventory WHERE account_id=3 AND product_name="New Era NY CAP" AND status="stored" LIMIT 3
        }
        // $sql = 'UPDATE inventory SET status=:status, arranged_date=:arranged_date WHERE product_id=:product_id';
        // WHERE account_id in (SELECT * FROM inventory WHERE account_id=2 AND product_name="New Era NY CAP" AND status="stored" LIMIT 3);
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
        
        $isUpdateOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isUpdateOK;
    }
}

?>