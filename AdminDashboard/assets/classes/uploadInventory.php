<?php
    require_once("inventory.php");
    require_once("inventoryDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $sku = '111111111';
    $floatingCompanyId = (int)$_POST['floatingCompanyId'];
    $floatingName = $_POST['floatingName'];
    $floatingBrand = $_POST['floatingBrand'];
    $floatingCategory = $_POST['floatingCategory'];
    $floatingColour = $_POST['floatingColour'];
    $floatingSize = $_POST['floatingSize'];
    $floatingWeight = $_POST['floatingWeight'];
    $floatingDimension = $_POST['floatingDimension'];
    $floatingStoredDate = $_POST['floatingStoredDate'];
    $sent_date = '0000-00-00 00:00:00';
    $delivered_date = '0000-00-00 00:00:00';
    $status = 'stored';

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

    $dao = new InventoryDAO();
    // var_dump($dao);
    $insertOK = $dao->uploadInventory($sku, $floatingCompanyId, $floatingName, $floatingBrand, $floatingCategory, 
    $floatingColour, $floatingSize, $floatingWeight, $floatingDimension, $floatingStoredDate, $sent_date, $delivered_date, $status);
    // var_dump($insertOK);
    
    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Product successfully added!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Item failed to be added!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>