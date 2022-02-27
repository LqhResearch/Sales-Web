<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<?php
// Nhập vào từ excel
if (isset($_POST['import-excel-btn'])) {
    // Lấy dữ liệu từ file excel tạo thành mảng
    $shippers = Excel_Database::ImportExcel($_FILES['import-excel']['tmp_name']);

    // Lấy mảng dữ liệu chèn vào database
    $result = Excel_Database::ImportDatabase('Shippers', $shippers);
    $message = 'Thêm thành công từ excel ' . $result["successRow"] . '/' . $result["totalRow"] . ' dòng';
}

// Xuất ra file excel
if (isset($_POST['export-excel'])) {
    Excel_Database::ExportExcel('Shippers', [["ID", "Tên nhân viên", "Số điện thoại"]]);
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
            <h2 class="text-center text-success">Danh sách shipper</h2>
        </div>
        <div class="mt-3 ms-3">
            <a href="add.php" class="btn btn-primary">Thêm mới</a href="add.php">
            <form action="#" method="POST" class="excel" enctype="multipart/form-data" >
                <input type="file" name="import-excel">
                <button name="import-excel-btn" class="btn btn-success">
                    <i class="far fa-file-excel"></i> Import
                </button>
            </form>
            <form action="#" method="POST" class="excel">
                <button name="export-excel" class="btn btn-success">
                <i class="far fa-file-excel"></i> Export
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID. </th>
                        <th scope="col">Tên shipper</th>
                        <th scope="col">Số điện thoại</th>
                        <th width="69">Sửa</th>
                        <th width="69">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $shippers = Database::GetData("SELECT * FROM Shippers ORDER BY ShipperID DESC");
                    foreach ($shippers as $shipper) {
                        echo '
                            <tr>
                                <th scope="row">' . $shipper["ShipperID"] . '</th>
                                <td>' . $shipper["ShipperName"] . '</td>
                                <td>' . $shipper["Phone"] . '</td>
                                <td><a href="edit.php?id=' . $shipper["ShipperID"] . '" class="btn btn-success">Sửa</a></td>
                                <td><a href="?del-id=' . $shipper["ShipperID"] . '" class="btn btn-danger">Xóa</a></td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var importExcel = document.querySelector('input[name="import-excel"]');
    importExcel.onchange = function () {
        importExcel.parentElement.querySelector('button').click();
    }
</script>

<?php include '../footer.php'?>