<?php
    require_once("user.php");
    require_once("connectionManager.php");
    require_once('userDAO.php');

    $dao = new UserDAO();
    // $email = 'ryan@hotmail.com';
    $user = $dao->retrieve($email);
    // var_dump($user);

    $items = [];
    foreach ( $user as $aUser ) {
        $item["account_id"] = $aUser->getAccountId();
        $item["email"] = $aUser->getEmail();
        $item["password"] = $aUser->getPassword();
        $item["company_name"] = $aUser->getCompanyName();
        $item["role"] = $aUser->getRole();
        $items[] = $item;
    }

    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;

?>