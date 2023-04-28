<!-- Side bar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/bookstore/apps/admin/index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">BK BOOK</div>
                </a>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Quản lý sách</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">             
                            <a class="collapse-item" href="index.php?action=Admin&act=allproduct">Tất cả sách</a>
                            <a class="collapse-item" href="index.php?action=Admin&act=addproduct">Thêm sách mới</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">             
                            <a class="collapse-item" href="index.php?action=Admin&act=alluser">Tất cả tài khoản</a>
                            <a class="collapse-item" href="index.php?action=Admin&act=adduser">Thêm tài khoản</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Quản lý thể loại</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">             
                            <a class="collapse-item" href="index.php?action=Admin&act=allcategory">Tất cả thể loại</a>
                            <a class="collapse-item" href="index.php?action=Admin&act=addcategory">Thêm thể loại</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Quản lý Đơn đặt hàng</span>
                    </a>
                </li>
            </ul>
            <!-- Side bar -->