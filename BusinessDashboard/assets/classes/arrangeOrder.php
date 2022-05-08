<?php
    require_once("order.php");
    require_once("orderDAO.php");
    require_once("connectionManager.php");

    // session_start();
    
    $account_id = $_POST['floatingAccountId'];
    $product_id = $_POST['floatingProductId'];
    $product_name = $_POST['floatingName'];
    $product_brand = $_POST['floatingBrand'];
    $product_type = $_POST['floatingCategory'];
    $product_colour = $_POST['floatingColour'];
    $product_size = $_POST['floatingSize'];
    $product_weight = $_POST['floatingWeight'];
    $product_dimension = $_POST['floatingDimension'];
    $address1 = $_POST['floatingAddress1'];
    $address2 = $_POST['floatingAddress2'];
    $postal_code = $_POST['floatingPostal'];
    $unit_number = $_POST['floatingUnit'];

    $dao = new OrderDAO();
    $insertOK = $dao->arrangeOrder($account_id, $product_id, $product_name, $product_brand ,$product_type, $product_colour, $product_size, $product_weight ,$product_dimension, $address1, $address2, $postal_code, $unit_number);
    // var_dump($insertOK);
    
    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Delivery successfully placed!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Delivery failed to be placed!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>