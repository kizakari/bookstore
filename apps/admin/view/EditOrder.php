<div class="container-fluid">
                        <?php 
                            $id = $_GET['id'];
                            $ad = new Admin();
                            
                            $order = $ad->getSingleOrder($id);
                            

                        ?>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa thông tin hóa đơn</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?action=Product&act=editOrder" method="POST" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="">ID khách hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="userId" value="<?php echo $order['user_id'] ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">ID hóa đơn</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="id" value="<?php echo $order['id'] ?>" required readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Ngày đặt</label>
                                            <input type="datetime-local" class="form-control" id="" placeholder="" name="date" value="<?php echo $order['order_date']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tổng tiền</label>
                                            <input type="number" class="form-control" id="" placeholder="" name="total" value="<?php echo $order['order_total'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Mã quyền</label>
                                            <select class="form-control" aria-label="Default select example" name="status" required>
                                                <option <?php echo ($order['order_status'] == 'Paid' ) ? "selected" : "" ?> value="Paid"> Paid</option>
                                                <option <?php echo ($order['order_status']  == 'UnPaid') ? "selected" : "" ?> value="UnPaid">UnPaid</option>
                                                <option <?php echo ($order['order_status'] == 'Fail' ) ? "selected" : "" ?> value="Fail">Fail</option>
                                                <option <?php echo ($order['order_status'] == 'Success' ) ? "selected" : "" ?> value="Success">Success</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </div>
                        </div>
                    </div>
        

