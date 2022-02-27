<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=PROJECT_NAME . "index.php"?>">Trang chủ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Shippers</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . "Shippers/add.php"?>">Thêm shipper</a></li>
                    <li><a class="dropdown-item" href="<?=PROJECT_NAME . "Shippers/list.php"?>">Danh sách shipper</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>