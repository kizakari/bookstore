<?php 
session_start();
include_once './Model/admin.php';
include_once './Model/product.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BB Admin - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        
        <!-- Custom styles for this template -->
        <link href="/bookstore/apps/admin/public/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="/bookstore/apps/admin/public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        
        <div id="wrapper">
            
            <?php 
                $ctrl = "Admin";
                if (isset($_GET['action'])) {
                    $ctrl = $_GET['action'];
                }
                include_once './view/components/sidebar.php';
                
                include_once './view/components/footer.php';
            ?>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php 
                        include_once './view/components/header.php';
                        include_once 'Controllers/' . $ctrl . "Controller.php";
                    ?>
                </div>
            </div>
        </div>
        

        <script src="./public/vendor/jquery/jquery.min.js"></script>
        <script src="./public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="./public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="./public/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="./public/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="./public/js/demo/chart-area-demo.js"></script>
        <script src="./public/js/demo/chart-pie-demo.js"></script>
        
        

        <!-- Core plugin JavaScript-->
        

        

        <!-- Page level plugins -->
        <script src="./public/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="./public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="./public/js/demo/datatables-demo.js"></script>
    </body>
</html>