<div class="container-fluid">
                        <?php 
                            $id = $_GET['id'];
                            $ad = new Admin();
                            $user = $ad->getUserSingle($id);

                        ?>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa thông tin khách hàng</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?action=User&act=updateUser" method="POST" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="">ID khách hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="id" value="<?php echo $user['id'] ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên khách hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="name" value="<?php echo $user['name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email khách hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="email" value="<?php echo $user['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">SĐT khách hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="phone" value="<?php echo $user['phone_number'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Mã quyền</label>
                                            <select class="form-control" aria-label="Default select example" name="vaitro" required>
                                                <option <?php echo ($user['role'] == '1') ? "selected" : "" ?> value="1"> Admin</option>
                                                <option <?php echo ($user['role'] == '0') ? "selected" : "" ?> value="0">User</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </div>
                        </div>
                    </div>
        

