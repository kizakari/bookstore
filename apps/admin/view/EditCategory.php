<div class="container-fluid">
                        <?php 
                            $id = $_GET['id'];
                            $ad = new Admin();
                            $category = $ad->getSingleCategory($id);

                        ?>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa thông tin khách hàng</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?action=Product&act=updateCtg" method="POST" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="">ID thể loại</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="id" value="<?php echo $category['id'] ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên thể loại</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="name" value="<?php echo $category['category_name'] ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </div>
                        </div>
                    </div>
        

