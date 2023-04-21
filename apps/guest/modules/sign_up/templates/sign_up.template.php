<?php
    class sign_upViewClass{
        function startForm(){
            include($_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/signup.html");
        }
        function existEmail(){
            echo "<script>
                document.getElementById(\"email-warn\").style.display=\"block\";
            </script>";
        }
        function success(){
            echo "<script>
                alert(\"Sign up successfully!\");
            </script>";
        }   
    }
    $sign_upView = new sign_upViewClass;
?>