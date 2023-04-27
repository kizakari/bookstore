<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/UserAccount.php';
    require_once "../templates/setting.template.php";
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: /bookstore/apps/guest/modules/sign_in/actions/sign_in.controller.php");
    }

    else{
        $database = new Database();
        $db = $database->connect();
        $user = new Account($db);
        //$user->getAllInfo($_SESSION['user_id']);
        $settingView->startForm($user);
    }
?>