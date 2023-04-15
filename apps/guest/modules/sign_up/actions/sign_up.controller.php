<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/model/login.db.php';
    require_once "../templates/sign_up.template.php";
    $sign_upView->startForm();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "Checking account exist!";
        $account = new Account($_POST["name"],$_POST["email"],$_POST["password"]);
        #Check user email
        if($sign_upModel->checkAccountExist($account)){
            #if exist then show warning for user
            $sign_upView->existEmail();
        }
        else{
            #if does not exist okay
            $sign_upModel->addNewAccount($account);
            sleep(2);
            header("Location: /apps/guest/modules/sign_in/actions/sign_in.controller.php");
        }
    }
    











?>

