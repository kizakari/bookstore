<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/model/UserAccount.php';
    require_once "../templates/sign_in.template.php";

    #User loged in
    if($_SESSION['user_id']!=''){
        header("Location: /apps/guest/modules/home/actions/homepage.controller.php");
    }
    else
        $sign_inView->startForm();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Connect to database
        $database = new Database();
        $db = $database->connect();
        $user = new Account($db);

        $user->email = $_POST["email"];
        $user->password = $_POST["password"];
        #Check user email and password
        if($user->isValidate()){
            $_SESSION['user_id'] = $user->getId();
            header("Location: /apps/guest/modules/home/actions/homepage.controller.php");
        }
        else{
            $sign_inView->invalidAccount();
        }
    }
?>