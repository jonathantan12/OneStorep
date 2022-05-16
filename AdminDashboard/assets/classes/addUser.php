<?php
    require_once("user.php");
    require_once("userDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $companyName = $_POST['companyName'];
    $contactNumber = $_POST['contactNumber'];
    $role = 'user';

    $dao = new UserDAO();
    $insertOK = $dao->addUser($email, $password, $companyName, $contactNumber, $role);
    // var_dump($insertOK);
    
    if ($insertOK) {
        // echo "<script>alert('Product successfully added!'); javascript:history.go(-1); location.reload(); </script>";
        echo "<script>alert('User successfully added!'); document.referrer ? window.location = document.referrer : history.back(); </script>";

    } 
    else{
        echo "<script>alert('User failed to be added!'); document.referrer ? window.location = document.referrer : history.back();</script>";
    }

?>