<?php 
    session_start();
    session_destroy();
    header("Location: /apps/guest/modules/home/actions/homepage.controller.php");
?>