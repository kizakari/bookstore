
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
                                            <th>Mã sách</th>
                                            <th>Tên sách</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Ngày phát hành</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã sách</th>
                                            <th>Tên sách</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Ngày phát hành</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $pd = new Product();
                                            $book = $pd->getListAll();
                                            if ($book->num_rows > 0) {
                                                while($result = $book->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td><?php echo $result['product_name']; ?></td>
                                                    <td><?php echo $result['price']; ?></td>
                                                    <td><?php echo $result['quantity']; ?></td>
                                                    <td>2011/04/25</td>
                                                    
                                                    <td>
                                                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=editproduct&id=<?php echo $result['id'] ?>">Edit</a>                 
                                                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deletePr&id=<?php echo $result['id'] ?>">Detele</a>
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
