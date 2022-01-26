<?php
    require_once("inventory.php");
    require_once("inventoryDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $floatingCompanyId = (int)$_POST['floatingCompanyId'];
    $floatingName = $_POST['floatingName'];
    $floatingBrand = $_POST['floatingBrand'];
    $floatingCategory = $_POST['floatingCategory'];
    $floatingColour = $_POST['floatingColour'];
    $floatingSize = $_POST['floatingSize'];
    $floatingWeight = $_POST['floatingWeight'];
    $floatingDimension = $_POST['floatingDimension'];
    $floatingStoredDate = $_POST['floatingStoredDate'];
    $sent_date = NULL;
    $delivered_date = NULL;
    $status = 'stored';

    $quantity = $_POST['floatingQuantity'];

    $dao = new InventoryDAO();
    for ($x = 0; $x < $quantity; $x++) {
        $insertOK = $dao->uploadInventory($floatingCompanyId, $floatingName, $floatingBrand, $floatingCategory, 
        $floatingColour, $floatingSize, $floatingWeight, $floatingDimension, $floatingStoredDate, $sent_date, $delivered_date, $status);
    }
    
    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Product successfully added!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Item failed to be added!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>