<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'onestorep'; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO orders (account_id, product_id, product_name, product_brand ,product_type, product_colour, product_size, product_weight , product_dimension, address1, address2, postal_code, unit_number) 
                VALUES (:account_id, :product_id, :product_name, :product_brand , :product_type, :product_colour, :product_size, :product_weight, :product_dimension, :address1, :address2, :postal_code, :unit_number)";

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

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>