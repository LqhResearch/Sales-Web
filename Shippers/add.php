<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    $sql = "INSERT INTO Shippers VALUES (null, '$name', '$phone')";
    if (Database::NonQuery($sql)) {
        $message = "Thêm thành công";
    }
}
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
            <h2 class="text-center text-success">Thêm shipper</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Tên shipper:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <button class="btn btn-primary" name="submit">Thêm shipper</button>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'?>