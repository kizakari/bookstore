<div class="container-fluid">
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Khách hàng</th>
                                            <th>Email</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Khách hàng</th>
                                            <th>Email</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $pd = new Admin();
                                            $order = $pd->getAllOrder();
                                            if ($order->num_rows > 0) {
                                                while($result = $order->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td><?php echo $result['name']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td><?php echo $result['order_date']; ?></td>
                                                    <td><?php echo $result['order_total']; ?></td>
                                                    <td><?php echo $result['order_status']; ?></td>
                                                    
                                                    
                                                    <td>
                                                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=editorder&id=<?php echo $result['id'] ?>">Edit</a>                 
                                                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deleteOrder&id=<?php echo $result['id'] ?>">Detele</a>
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