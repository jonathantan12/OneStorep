<?php
    require_once("user.php");
    require_once("connectionManager.php");
    require_once('userDAO.php');

    $dao = new UserDAO();
    $products = $dao->retrieveAllUsers();

    $items = [];
    foreach ( $products as $aProduct ) {
        $item["account_id"] = $aProduct->getAccountId();
        $item["email"] = $aProduct->getEmail();
        $item["password"] = $aProduct->getPassword();
        $item["company_name"] = $aProduct->getCompanyName();
        $item["contact_number"] = $aProduct->getContactNumber();
        $items[] = $item;
    }

    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;

?>