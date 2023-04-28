
        <!-- Custom fonts for this template-->
        <!-- Custom fonts for this template -->
        <link href="/bookstore/apps/admin/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/bookstore/apps/admin/public/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="/bookstore/apps/admin/public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tất cả sách</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>                                
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>                                
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $ad = new Admin();
                                            $category = $ad->getAllCategory();
                                            if ($category->num_rows > 0) {
                                                while($result = $category->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td><?php echo $result['category_name']; ?></td>
                                            
                                                    
                                                    <td>
                                                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=editcategory&id=<?php echo $result['id'] ?>">Edit</a>                 
                                                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deleteCtg&id=<?php echo $result['id'] ?>">Detele</a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            }
                                        }
                                        else 
                                        {
                                            echo "No products available";
                                            }
                                            ?>                                                                 
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                        </div>
                    </div>

            
        

        <script src="../public/vendor/jquery/jquery.min.js"></script>
        <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../public/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../public/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../public/js/demo/datatables-demo.js"></script>