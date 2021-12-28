<?php
    require_once("user.php");
    require_once("connectionManager.php");
    require_once('userDAO.php');

    $dao = new UserDAO();
    $email = 'ryan@hotmail.com';
    // var_dump($itemname);
    $products = $dao->retrieve($email);
    // var_dump($products);

    $items = [];
    foreach ( $products as $aProduct ) {
        $item["account_id"] = $aProduct->getAccountId();
        $item["email"] = $aProduct->getEmail();
        $item["password"] = $aProduct->getPassword();
        $item["company_name"] = $aProduct->getCompanyName();
        $items[] = $item;
    }

    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;

?>