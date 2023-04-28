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
        $user->getPersonalInfo($_SESSION['user_id']);
        $settingView->startForm($user);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $file = $_FILES['file'];
            $fileName = $_FILES["file"]["name"];
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileTmpName = $file['tmp_name'];
            $fileRel = '/bookstore/uploads/'.$user->id.".".$fileActualExt;
            $fileDest = $_SERVER['DOCUMENT_ROOT'].$fileRel;
            if(move_uploaded_file($fileTmpName,$fileDest)){
                $user->updateImage($fileRel);
            }
            else
                echo "<script>alert('Cannot update image!')</script>";

            $user->name = $_POST["name"];
            $user->email = $_POST["email"];
            if($_POST['new-password']!='')
                $user->password = $_POST["new-password"];
            if($_POST['phone']!='')
                $user->phone = $_POST['phone'];
            $user->updatePersonalInfo();
            if(isset($_POST['checkbox']))
                $user->updateFav($_POST['checkbox']);
            if(isset($_POST['addr']))
                $user->updateAddr($_POST['addr'],$_POST['defAddr']);
            $settingView->success();
        }
    }
?>