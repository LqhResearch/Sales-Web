<?php include_once '../config/config.php'?>
<?php include_once '../config/Database.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link ref="icon" href="../assets/img/favicon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $sql = "SELECT * FROM Users WHERE Username = '$username' AND Password = sha1('$password') AND Role = 1";
            $data = Database::GetData($sql);

            if($data) {
                session_start();
                $_SESSION['admin_login'] = true;
                $_SESSION['username'] = $data[0]['Username'];
                $_SESSION['fullname'] = $data[0]['Fullname'];
                $_SESSION['avatar'] = $data[0]['Avatar'];
                header("Location: index.php");
            }
        }
    ?>
    <div class="page-login d-flex-center page-login">
        <div class="card">
            <div class="card-header bg-success">
                <h2 class="text-center text-white">Đăng nhập</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="d-flex-center">
                        <button class="btn btn-success">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>