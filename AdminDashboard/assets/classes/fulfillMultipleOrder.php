<?php
    require_once("multipleOrder.php");
    require_once("multipleOrderDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $order_id = $_GET['order_id'];

    $dao = new multipleOrderDAO();
    $deleteOK = $dao->fulfillOrder($order_id);

    if ($deleteOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('Order fulfilled succesfully!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('Order failed to be updated!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>