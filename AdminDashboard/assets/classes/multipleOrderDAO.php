<?php
require_once("multipleOrder.php");
require_once("connectionManager.php");

class multipleOrderDAO {

    public function getOrder($account_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT * FROM multiple_orders WHERE account_id=:account_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);

        $stmt->execute();

        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new multipleOrder($row['order_id'], $row['account_id'], $row['product_name1'], $row['product_quantity1'], $row['product_name2'] 
            ,$row['product_quantity2'], $row['product_name3'], $row['product_quantity3'], $row['product_name4'], $row['product_quantity4'], $row['product_name5'],
            $row['product_quantity5'], $row['product_name6'], $row['product_quantity6'],$row['product_name7'], $row['product_quantity7'],
            $row['product_name8'], $row['product_quantity8'], $row['product_name9'], $row['product_quantity9'],$row['product_name10'], $row['product_quantity10'],
            $row['address1'], $row['address2'], $row['postal_code'], $row['unit_number'], $row['customer_name'], $row['customer_contact'], $row['order_status'], $row['arranged_date'], $row['sent_date']);
        }
        $stmt = null;
        $pdo = null;

        return $result;
    }

    public function fulfillOrder($order_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        date_default_timezone_set("Asia/Singapore");
        $sent_date = date("Y-m-d H:i");
        $order_status = 'sent';

        $sql = "UPDATE multiple_orders SET order_status=:order_status, sent_date=:sent_date WHERE order_id=:order_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':order_status', $order_status, PDO::PARAM_STR);
        $stmt->bindParam(':sent_date', $sent_date, PDO::PARAM_STR);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    
        $isUpdateOK = $stmt->execute();

        $stmt = null;
        $pdo = null;   

        return $isUpdateOK;
    }

    public function updateInventory($account_id, $product_name1, $product_quantity1, $product_name2, $product_quantity2, $product_name3, $product_quantity3, 
    $product_name4, $product_quantity4, $product_name5, $product_quantity5, $product_name6, $product_quantity6, $product_name7, $product_quantity7, 
    $product_name8, $product_quantity8, $product_name9, $product_quantity9, $product_name10, $product_quantity10) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        date_default_timezone_set("Asia/Singapore");
        $arranged_date = date("Y-m-d h:i");
        // var_dump($arranged_date);
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

        if (!($product_name6 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name6);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity6, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 
        } 

        if (!($product_name7 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name7);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity7, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 

        } 

        if (!($product_name8 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name8);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity8, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 
        } 
        if (!($product_name9 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name9);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity9, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 

        } 
        if (!($product_name10 == "")){
            $sql = "UPDATE inventory SET status=:status, arranged_date=:arranged_date
            WHERE product_id 
            IN (SELECT product_id 
            FROM (SELECT product_id FROM inventory WHERE account_id=:account_id AND product_name=:product_name AND product_size=:product_size AND status=:stored_status LIMIT :product_quantity1) tmp )";
            
            $temp_list = explode(" (", $product_name10);
            $product_name = $temp_list[0];
            $product_size = substr($temp_list[1] , 0, -1);
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':arranged_date', $arranged_date, PDO::PARAM_STR);
            $stmt->bindParam(':account_id', $account_id, PDO::PARAM_STR);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_size', $product_size, PDO::PARAM_STR);
            $stmt->bindParam(':product_quantity1', $product_quantity10, PDO::PARAM_INT);
            $stmt->bindParam(':stored_status', $stored_status, PDO::PARAM_STR);

            $isUpdateOK = $stmt->execute(); 

        } 

        $stmt = null;
        $pdo = null;   

        return $isUpdateOK;
    }
}

?>