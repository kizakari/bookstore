<?php 
    session_start();
    class Header{
        public function show(){
            if($_SESSION['user_id']!=''){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/model/Database.php';
                require_once $_SERVER['DOCUMENT_ROOT'] . '/model/UserAccount.php';
                $database = new Database();
                $db = $database->connect();
                $user = new Account($db);
                $user->id = $_SESSION['user_id'];
                require_once $_SERVER['DOCUMENT_ROOT']."/web/html/header2.html";
                echo "<script>document.getElementById('pic').src='".$user->getImage()."'</script>";
            }
            else
                require_once $_SERVER['DOCUMENT_ROOT']."/web/html/header1.html";
        }
    }
?>