<?php
    require_once("user.php");
    require_once("connectionManager.php");
    require_once('userDAO.php');

    $dao = new UserDAO();
    $email = 'ryan@hotmail.com';
    // var_dump($itemname);
    $user = $dao->retrieve($email);
    // var_dump($products);

    $items = [];
    foreach ( $user as $aUser ) {
        $item["account_id"] = $aUser->getAccountId();
        $item["email"] = $aUser->getEmail();
        $item["password"] = $aUser->getPassword();
        $item["company_name"] = $aUser->getCompanyName();
        $item["role"] = $aUser->getRole();
    }

    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;

?>