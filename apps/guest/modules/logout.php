<?php 
    session_start();
    session_destroy();
    header("Location: /bookstore/apps/guest/modules/home/actions/homepage.controller.php");
?>