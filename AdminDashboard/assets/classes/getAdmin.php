<?php
    require_once("admin.php");
    require_once("connectionManager.php");
    require_once('adminDAO.php');

    $dao = new AdminDAO();
    // $email = 'vivian@hotmail.com';
    $account_id = $_GET['account_id'];
    // var_dump($itemname);
    $products = $dao->retrieveUser($account_id);
    // var_dump($products);

    $items = [];
    foreach ( $products as $aProduct ) {
        $item["account_id"] = $aProduct->getAccountId();
        $item["email"] = $aProduct->getEmail();
        $item["password"] = $aProduct->getPassword();
        $item["user_name"] = $aProduct->getUserName();
        $items[] = $item;
    }

    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;

?>