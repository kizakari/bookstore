<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/UserAccount.php';
    require_once "../templates/sign_up.template.php";
    $sign_upView->startForm();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "Checking account exist!";
        $database = new Database();
        $db = $database->connect();
        $user = new Account($db);

        $user->name = $_POST["name"];
        $user->email = $_POST["email"];
        $user->password = $_POST["password"];
        #Check user email
        if($user->isExist()){
            //if exist then show warning for user
            $sign_upView->existEmail();
        }
        else{
            #if does not exist okay
            $user->save();
            sleep(2);
            header("Location: /bookstore/apps/guest/modules/sign_in/actions/sign_in.controller.php");
        }
    }
    











?>

