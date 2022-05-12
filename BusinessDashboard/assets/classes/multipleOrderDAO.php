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

    public function updateInventory($account_id, $product_name1, $product_quantity1, $product_name2, $product_quantity2, $product_name3, $product_quantity3, 
    $product_name4, $product_quantity4, $product_name5, $product_quantity5) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        date_default_timezone_set("Asia/Singapore");
        $arranged_date = date("Y-m-d");
        $status = 'arranged';
        $stored_status = 'stored';

        if (!($product_name1 == "")){
            // $sql = 'UPDATE inventory SET status=:status, arranged_date=:arranged_date WHERE product_name=:product_name LIMIT :product_quantity1';
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name1);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            // var_dump($status);
            // var_dump($arranged_date);
            // var_dump($account_id);
            // var_dump($product_name);
            // var_dump($product_size);
            // var_dump($product_quantity1);
            // var_dump($stored_status);

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity1, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute();
        }

        if (!($product_name2 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name2);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity2, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute();

        }

        if (!($product_name3 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name3);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity3, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute();
            
        }

        if (!($product_name4 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name4);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity4, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute();
        
        }

        if (!($product_name5 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name5);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity5, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 

        } 

        $stmt = null;
        $pdo = null;   

        return $isUpdateOK;
    }
}

?>