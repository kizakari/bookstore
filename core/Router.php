<?php 
function getFilename(Array $routes ,string $url){
    foreach($routes as $route => $file){
        if(strpos($url,$route) !== false){
            return $file;
        }
    }
    return false;
}
?>