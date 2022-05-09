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

    public function uploadInventory($floatingCompanyId, $floatingName, $floatingBrand, $floatingCategory, $floatingColour, $floatingSize, $floatingWeight, $floatingDimension, $floatingStoredDate, $arranged_date, $sent_date, $status) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
       
        // var_dump($sku);
        // var_dump((int)$floatingCompanyId);
        // var_dump($floatingName);
        // var_dump($floatingBrand);
        // var_dump($floatingCategory);
        // var_dump($floatingColour);
        // var_dump($floatingSize);
        // var_dump($floatingWeight);
        // var_dump($floatingDimension);
        // var_dump($floatingStoredDate);
        // var_dump($sent_date);
        // var_dump($delivered_date);
        // var_dump($status);

        $sql = "insert into inventory (account_id, product_name, product_brand, product_type, product_colour, product_size, product_weight, product_dimension, stored_date, arranged_date, sent_date, status) 
                values (:account_id, :product_name, :product_brand, :product_type, :product_colour, :product_size, :product_weight, :product_dimension, :stored_date, :arranged_date, :sent_date, :status)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(":account_id",$floatingCompanyId,PDO::PARAM_INT);
        $stmt->bindParam(":product_name",$floatingName,PDO::PARAM_STR);
        $stmt->bindParam(":product_brand",$floatingBrand,PDO::PARAM_STR);
        $stmt->bindParam(":product_type",$floatingCategory,PDO::PARAM_STR);
        $stmt->bindParam(":product_colour",$floatingColour,PDO::PARAM_STR);
        $stmt->bindParam(":product_size",$floatingSize,PDO::PARAM_STR);
        $stmt->bindParam(":product_weight",$floatingWeight,PDO::PARAM_STR);
        $stmt->bindParam(":product_dimension",$floatingDimension,PDO::PARAM_STR);
        $stmt->bindParam(":stored_date",$floatingStoredDate,PDO::PARAM_STR);
        $stmt->bindParam(":arranged_date",$arranged_date,PDO::PARAM_STR);
        $stmt->bindParam(":sent_date",$sent_date,PDO::PARAM_STR);
        $stmt->bindParam(":status",$status,PDO::PARAM_STR);
        
        $isAddOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isAddOK;

        // if ($isAddOK) {
        //     echo "<script>alert('Product successfully added!'); location.reload();</script>";
        // } 
        // else{
        //     echo "<script>alert('Failed login, please try again!'); location.reload();</script>";
        // }
    }

    public function updateInventoryStatus($status, $product_id, $date) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        if ($status === 'stored') {
            $sql = 'UPDATE inventory SET status=:status, stored_date=:date WHERE product_id=:product_id; 
            UPDATE inventory SET arranged_date=null WHERE product_id=:product_id;
            UPDATE inventory SET sent_date=null WHERE product_id=:product_id;';
        }
        elseif ($status === 'arranged') {
            $sql = 'UPDATE inventory SET status=:status, arranged_date=:date WHERE product_id=:product_id
            UPDATE inventory SET sent_date=null WHERE product_id=:product_id;';
        }
        elseif ($status === 'sent') {
            $sql = 'UPDATE inventory SET status=:status, sent_date=:date WHERE product_id=:product_id';
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        
        $isUpdateOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isUpdateOK;
    }

    public function deleteInventory($product_id) {
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = 'DELETE FROM inventory WHERE product_id=:product_id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        
        $isDeleteOK = $stmt->execute();
        $stmt = null;
        $pdo = null;    

        return $isDeleteOK;
    }
}

?>