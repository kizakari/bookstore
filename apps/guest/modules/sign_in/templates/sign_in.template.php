<?php
Class sign_inViewClass{
    function startForm(){
        include($_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/signin.html");
    }
    function invalidAccount(){
        echo "<script>
            document.getElementById(\"account-warn\").style.display=\"block\";
        </script>";
    }
    function success(){
        echo "<script>
            alert(\"Sign up successfully!\");
        </script>";
    }   
}
    $sign_inView = new sign_inViewClass;
?>