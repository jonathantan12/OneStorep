<?php
require_once("order.php");
require_once("connectionManager.php");

class OrderDAO {
    public function getOrder($product_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT * FROM orders WHERE product_id=:product_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->execute();

        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Order($row['order_id'], $row['account_id'], $row['product_id'], $row['product_name'], $row['product_brand'] ,$row['product_type']
            , $row['product_colour'], $row['product_size'], $row['product_weight'], $row['product_dimension'], $row['address1'], $row['address2']
            , $row['postal_code'], $row['unit_number']);
        }
        $stmt = null;
        $pdo = null;

        return $result;
    }

    public function arrangeOrder($account_id, $product_id, $product_name, $product_brand ,$product_type, $product_colour, $product_size, $product_weight ,$product_dimension, $address1, $address2, $postal_code, $unit_number) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "INSERT INTO orders (account_id, product_id, product_name, product_brand ,product_type, product_colour, product_size, product_weight , product_dimension, address1, address2, postal_code, unit_number) 
                VALUES (:account_id, :product_id, :product_name, :product_brand , :product_type, :product_colour, :product_size, :product_weight, :product_dimension, :address1, :address2, :postal_code, :unit_number)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":account_id",$account_id,PDO::PARAM_STR);
        $stmt->bindParam(":product_id",$product_id,PDO::PARAM_STR);
        $stmt->bindParam(":product_name",$product_name,PDO::PARAM_STR);
        $stmt->bindParam(":product_brand",$product_brand,PDO::PARAM_STR);
        $stmt->bindParam(":product_type",$product_type,PDO::PARAM_STR);
        $stmt->bindParam(":product_colour",$product_colour,PDO::PARAM_STR);
        $stmt->bindParam(":product_size",$product_size,PDO::PARAM_STR);
        $stmt->bindParam(":product_weight",$product_weight,PDO::PARAM_STR);
        $stmt->bindParam(":product_dimension",$product_dimension,PDO::PARAM_STR);
        $stmt->bindParam(":address1",$address1,PDO::PARAM_STR);
        $stmt->bindParam(":address2",$address2,PDO::PARAM_STR);
        $stmt->bindParam(":postal_code",$postal_code,PDO::PARAM_STR);
        $stmt->bindParam(":unit_number",$unit_number,PDO::PARAM_STR);
        
        $isAddOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isAddOK;
    }

    public function updateOrderToArranged($product_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        date_default_timezone_set("Asia/Singapore");
        $arranged_date = date("Y-m-d");
        $status = 'arranged';
        
        $sql = 'UPDATE inventory SET status=:status, arranged_date=:arranged_date WHERE product_id=:product_id';
        
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