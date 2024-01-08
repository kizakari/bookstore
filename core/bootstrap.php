<?php 
require __DIR__.'/DB.php';
require __DIR__.'/Router.php';
require __DIR__.'/../routes.php';

$fileName = getFilename($routes,$_SERVER['REQUEST_URI']);
if($fileName !== false){
    require __DIR__."/../api/".getFilename($routes,$_SERVER['REQUEST_URI']);
}
else{
    echo "Endpoint address doesn't exist :(";
}
?>