<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Category.php';
    class SettingView{
        function startForm($user){

            include($_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/setting.html");
            echo "<script>document.getElementById('email').value = '$user->email';</script>";
            echo "<script>document.getElementById('name').value = '$user->name';</script>";
            echo "<script>document.getElementById('phone').value = '$user->phone';</script>";

            #show favourite list
            $favList = $user->getFavList();
            $category = new Category($user->pdo);
            $cateList = $category->getListCategory();  
            $str="";    
            foreach($cateList as $cate){
                $str .="<button type='button' onclick=\'chooseCate(".$cate['id'].")\' class='category' id='".$cate['id']."'>".$cate['name']."</button>";
                $str.="<input type='checkbox' id='checkbox".$cate['id']."' value='".$cate['id']."' name='checkbox[]' hidden>";
            }
            echo "<script>document.getElementById('list-category').innerHTML = \"$str\"</script>";
            return;
        }
        function errorForm($listError){
            return;
        }
        function success(){
            echo "<script>window.location.href = '/bookstore/apps/guest/modules/sign_in/actions/sign_in.controller.php';</script>";
        }
    }
    $settingView = new SettingView;
?>