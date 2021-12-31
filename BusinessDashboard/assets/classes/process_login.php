<?php
    require_once("user.php");
    require_once("userDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $email = $_POST["email"];
    $_SESSION['email'] = $email; //added this

    $password = $_POST["password"];
    // var_dump($password);

    $dao = new UserDAO();
    $userDetails = $dao->retrieve($email);

    $success = false;
    if($userDetails and $password == $userDetails[0]->getPassword()){
        $account_id = $userDetails[0]->getAccountId(); // Account ID
        $_SESSION["account_id"] = $account_id; // SESSION THE ACCOUNT_ID

        $company_name = $userDetails[0]->getCompanyName(); //new
        $_SESSION["company_name"] = $company_name; // SESSION THE COMPANY NAME

        // $hashed = $userDetails[0]["hashed"];
        // $success = password_verify($password,$hashed); 
        $success = True; 

        if($success){
            $_SESSION["user"] = $email;
            // $_SESSION["account_id"] = $account_id;
            header("Location: ../../index.php?account_id=$account_id");
            
            exit;
        }
    }

    # Failed login
    if (!$success){
        // header("Location: ../../dashboardLogin.html");
        // echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>';
        echo "<script>alert('Failed login, please try again!'); window.location.href = '../../dashboardLogin.html';</script>";
    }
?>