<?php
    require_once("admin.php");
    require_once("adminDAO.php");
    require_once("connectionManager.php");

    session_start();
    
    $email = $_POST["email"];
    $_SESSION['email'] = $email; //added this

    $password = $_POST["password"];
    // var_dump($password);

    $dao = new AdminDAO();
    $userDetails = $dao->retrieve($email);

    $success = false;
    if($userDetails and $password === $userDetails[0]->getPassword()){
        $account_id = $userDetails[0]->getAccountId(); // Account ID
        $_SESSION["account_id"] = $account_id; // SESSION THE ACCOUNT_ID

        $user_name = $userDetails[0]->getUserName(); //new
        $_SESSION["user_name"] = $user_name; // SESSION THE COMPANY NAME

        $role = $userDetails[0]->getRole(); // role
        $_SESSION["role"] = $role; // SESSION THE ROLE

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
        echo "<script>alert('Failed login, please try again!'); window.location.href = '../../adminLogin.html';</script>";
    }
?>