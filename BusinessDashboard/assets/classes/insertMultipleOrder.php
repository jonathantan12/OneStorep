<?php
    require_once("multipleOrder.php");
    require_once("multipleOrderDAO.php");
    require_once("connectionManager.php");

    // session_start();
    $account_id = $_POST['floatingAccountId'];
    $product_name1 = $_POST['product_name1'];
    $product_quantity1 = $_POST['product_quantity1'];
    $product_name2 = $_POST['product_name2'];
    $product_quantity2 = $_POST['product_quantity2'];
    $product_name3 = $_POST['product_name3'];
    $product_quantity3 = $_POST['product_quantity3'];
    $product_name4 = $_POST['product_name4'];
    $product_quantity4 = $_POST['product_quantity4'];
    $product_name5 = $_POST['product_name5'];
    $product_quantity5 = $_POST['product_quantity5'];
    // $product_name2 ='';
    // $product_quantity2 ='';
    // $product_name3 ='';
    // $product_quantity3 ='';
    // $product_name4 ='';
    // $product_quantity4 ='';
    // $product_name5 = '';
    // $product_quantity5 = '';
    $address1 = $_POST['floatingAddress1'];
    $address2 = $_POST['floatingAddress2'];
    $postal_code = $_POST['floatingPostal'];
    $unit_number = $_POST['floatingUnit'];
    $customer_name = $_POST['floatingCustomerName'];
    $customer_contact = $_POST['floatingCustomerContact'];

    $dao = new multipleOrderDAO();
    $insertOK = $dao->insertMultipleOrder($account_id, $product_name1, $product_quantity1, $product_name2 ,$product_quantity2, $product_name3, $product_quantity3, $product_name4 ,$product_quantity4, $product_name5, $product_quantity5 ,$address1, $address2, $postal_code, $unit_number, $customer_name, $customer_contact);
    // var_dump($insertOK);
    // $updateOK = $dao->insertMultipleOrder($product_id);

    // if ($insertOK && $updateOK) {
    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        // echo "<script>alert('Delivery successfully placed!'); document.referrer ? window.location = document.referrer : history.back(); </script>";
        echo "<script>alert('Delivery successfully arranged!');</script>";
        header('Location: ../../arrangeDelivery.php?account_id=$account_id');
    } 
    else{
        echo "<script>alert('Delivery failed to be placed!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>