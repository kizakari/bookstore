                <div class="container-fluid">
                        
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Thêm sách mới</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?action=Product&act=createPr" method="POST" role="form" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="">Tên sách</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="name" value="" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thể loại</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="category" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tác giả</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="author" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giá</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="price" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="quantity" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hình ảnh</label>
                                            <input type="file" class="form-control" id="" placeholder="" name="image" value=""  onchange="document.getElementById('reviewImage').src = window.URL.createObjectURL(this.files[0])"  accept=".jpg,.png,.jpeg">
                                            <img id="reviewImage" class="rounded mx-auto d-block" alt="Review image" width="" src="/bookstore/web/assets/img/no-image.png" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Năm phát hành</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="year" value="" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            
                                            <textarea type="description" rows="5" class="form-control" id="" placeholder="" name="description" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm sách</button>
                                    </form>
                                </div>
                        </div>
                    </div>
        

