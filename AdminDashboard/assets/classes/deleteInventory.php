<?php
    require_once("inventory.php");
    require_once("inventoryDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $product_id = $_GET['product_id'];

    $dao = new InventoryDAO();
    $deleteOK = $dao->deleteInventory($product_id);

    if ($deleteOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Product deleted succesfully!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Product failed to be deleted!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>