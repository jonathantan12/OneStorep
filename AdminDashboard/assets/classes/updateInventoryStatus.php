<?php
    require_once("inventory.php");
    require_once("inventoryDAO.php");
    require_once("connectionManager.php");

    session_start();
    $status = $_POST['status'];
    var_dump($status);

    $product_id = $_GET['product_id'];
    var_dump($product_id);

    $date = $_POST['date'];
    var_dump($date);

    $dao = new InventoryDAO();
    $insertOK = $dao->updateInventoryStatus($status, $product_id, $date);

    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Product updated succesfully!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Product failed to be updated!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>