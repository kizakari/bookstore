<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/connect.db.php';
    function test(){
    echo "test function";
    global $pdo;
    $email = "dung.trandeptrai@hcmut.edu.vn";
    $stmt = $pdo->query("SELECT COUNT(1) FROM user WHERE email = '".$email."'");
    //echo count($stmt);
    $result = $stmt->fetch();
    if ((int)$result['COUNT(1)'] == 1) {
        echo "GOOD";
    }
    else 
        echo "SHIT";
    }
    function test2(){
        global $pdo;
        $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(["dunggg","dung@hhh.com","123456"]);
    }
    test2();
?>

