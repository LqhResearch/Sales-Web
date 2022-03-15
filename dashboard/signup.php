<?php include_once '../config/config.php'?>
<?php include_once '../config/Database.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link ref="icon" href="../assets/img/favicon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['password'] == $_POST['re-password']) {
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';

                $image = $_FILES['avatar']['tmp_name'];
                $image_name = $_FILES['avatar']['name'];
                $image_size = $_FILES['avatar']['size'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], "../uploads/$image_name");

                $sql = "INSERT INTO Users VALUES ('$username', sha1('$password'), '$fullname', '$email', 0, '../uploads/$image_name')";
                if (Database::NonQuery($sql)) {
                    $message = 'Đăng ký thành công';
                }
            } else {
                $message = 'Mật khẩu không khớp';
            }
        }
    ?>
    <div class="page-login d-flex-center page-login">
        <div class="card" style="width: 800px;">
            <div class="card-header bg-success">
                <h2 class="text-center text-white">Đăng ký</h2>
            </div>
            <div class="card-body">
                <?php
                    if (isset($message)) {
                        echo '
                            <div class="alert alert-info">
                                <strong>Thông báo!</strong> ' . $message . '
                            </div>
                        ';
                    }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên đăng nhập</label>
                            <input name="username" type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ tên</label>
                            <input name="fullname" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <input name="re-password" type="password" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            <input name="avatar" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex-center">
                        <button class="btn btn-success">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>