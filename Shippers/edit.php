<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<?php
    $id = (isset($_GET['id'])) ? $_GET['id'] : '';

    // Cập nhật dữ liệu cho nhân viên
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';

        $sql = "UPDATE Shippers SET ShipperName = '$name', Phone = '$phone' WHERE ShipperID = '$id'";
        if (Database::NonQuery($sql)) {
            $message = 'Cập nhật thành công';
        }
    }

    // Hiển thị dữ liệu của nhân viên
    $sql = "SELECT * FROM Shippers WHERE ShipperID = $id";
    $shipper = Database::GetData($sql)[0];
?>

<div class="container p-5">
    <?php
        if (isset($message)) {
            echo '
                <div class="alert alert-success">
                    <strong>Success!</strong> ' . $message . '
                </div>
            ';
        }
    ?>

    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-success">Cập nhật nhân viên</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Tên nhân viên:</label>
                        <input type="text" class="form-control" name="name" value="<?=$shipper['ShipperName']?>">
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" name="phone" value="<?=$shipper['Phone']?>">
                    </div>
                </div>
                <button class="btn btn-primary" name="submit">Cập nhật nhân viên</button>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'?>