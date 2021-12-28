<?php
require_once("Products.php");

class ProductsDAO {
    public function getProducts() {
        $dsn = "mysql:host=localhost;dbname=cssr;port=3306";
        $pdo = new PDO($dsn, "root", "root");
        $sql = 'select * from products';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Products($row['product_id'], $row['product_name'], $row['product_desc'], $row['type'] ,$row['colour'], $row['price'], $row['image']);
        }
        $stmt = null;
        $pdo = null;

        return $result;
    }

}


?>