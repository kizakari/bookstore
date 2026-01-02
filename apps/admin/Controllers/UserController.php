<?php 
if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'updateUser':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = $_POST['vaitro'];

                $ad = new Admin();
                $User = $ad->getUserSingle($id);

                if($User) {
                    $ad->updateUser($id, $name, $email, $phone, $role);
                    echo "<script>alert('Update user success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('Update user fail')</script>";
                    include "./view/EditUser.php";
                }
            }
            break;
        
        case 'deleteUser':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $ad = new Admin();
                $user = $ad->getUserSingle($id);

                if ($user) {
                    $ad->deleteUser($id);
                    echo "<script>alert('Delete User Success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('User not exists')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=alluser"/>';
                }
            } else {
                    echo "<script>alert('Delete User Fail')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=alluser"/>';
            }
            break;
        
        case 'createUser':
            $ad = new Admin();         
            
            $user = array (
                'name' => $_POST["name"],
                
                'email' => $_POST["email"],
                'phone_number' => $_POST["phone"],
                'password' => $_POST["password"],
                'role' => 0
            );

            $ad->createUser($user);
            echo "<script>alert('Add User success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=alluser"/>';

            break;
        
    } 
}
?>