<?php 
    class SettingView{
        function startForm($user){
            
            include($_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/setting.html");
        }
        function errorForm($listError){
            return;
        }
    }
    $settingView = new SettingView;
?>