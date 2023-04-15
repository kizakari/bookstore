<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/model/login.db.php';
    require_once "../templates/sign_in.template.php";
    $sign_inView->startForm();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        #Check user email and password
        if($sign_inModel->validateAccount($_POST["email"],$_POST["password"])){
            echo "we good";
        }
        else{
            $sign_inView->invalidAccount();
        }
    }
?>