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
        $_SESSION["account_id"] = $account_id; 

        $company_name = $userDetails[0]->getCompanyName(); //new
        $_SESSION["company_name"] = $company_name; 

        // $hashed = $userDetails[0]["hashed"];
        // $success = password_verify($password,$hashed); 
        $success = True; 

        if($success){
            $_SESSION["user"] = $email;
            
            header("Location: ../../dashboardIndex.php?$account_id");
            
            exit;
        }
    }

    # Failed login
    if (!$success){
        header("Location: ../../dashboardLogin.html");
        // echo "<script>alert('Failed login, please try again!'); window.location.href = '../../dashboardLogin.html';</script>";

    }
?>