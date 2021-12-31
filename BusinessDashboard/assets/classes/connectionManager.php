<?php

class ConnectionManager {

    public function getConnection() {

      //LocalHost
      $servername = 'localhost';
      $username = 'root';
      $password = 'root';
      $dbname = 'onestorep'; 

      // OneStorep
      // $servername = '127.0.0.1:3306';
      // $username = 'u294701835_onestorep';
      // $password = '$1Million';
      // $dbname = 'u294701835_onestorep'; 
    
      // Create connection
      //$conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);     
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

      // Return connection object
      return $conn;
    }

}

?>