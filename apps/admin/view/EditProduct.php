                    <div class="container-fluid">
                        <?php 
                            $id = $_GET['id'];
                            $ad = new Admin();
                            $book = $ad->getProductSingle($id);

                        ?>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tất cả sách</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?action=Product&act=editPr" method="POST" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="">Tên sách</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="name" value="<?php echo $book['product_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giá sách</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="price" value="<?php echo $book['price'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="quantity" value="<?php echo $book['quantity'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            
                                            <textarea type="description" rows="5" class="form-control" id="" placeholder="" name="description" ><?php echo $book['description']; ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </div>
                        </div>
                    </div>
        

