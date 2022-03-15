<nav class="navbar navbar-expand-sm lg--blue navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=PROJECT_NAME . 'dashboard/index.php'?>"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Nhân viên giao hàng</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'Shippers/add.php'?>">Thêm nhân viên</a></li>
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'Shippers/list.php'?>">Danh sách nhân viên</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'Products/add.php'?>">Thêm sản phẩm</a></li>
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'Products/list.php'?>">Danh sách sản phẩm</a></li>
                </ul>
            </li>
        </ul>

        <?php
            session_start();
            if (isset($_SESSION['admin_login'])) {
        ?>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link p-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <img width="40" src="<?=$_SESSION['avatar']?>" class="border rounded-circle" />
                    <span><?=$_SESSION['fullname']?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'dashboard/info.php'?>">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . 'dashboard/logout.php'?>">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
        <?php } else {?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=PROJECT_NAME . 'dashboard/login.php'?>"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=PROJECT_NAME . 'dashboard/signup.php'?>"><i class="fas fa-sign-in-alt"></i> Đăng ký</a>
            </li>
        </ul>
        <?php }?>
    </div>
</nav>