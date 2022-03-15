<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<?php
    // Nhập vào từ excel
    if (isset($_POST['import-excel-btn'])) {
        // Lấy dữ liệu từ file excel tạo thành mảng
        $shippers = Excel_Database::ImportExcel($_FILES['import-excel']['tmp_name']);

        // Lấy mảng dữ liệu chèn vào database
        $result = Excel_Database::ImportDatabase('Shippers', $shippers);
        $message = 'Thêm thành công từ excel ' . $result['successRow'] . '/' . $result['totalRow'] . ' dòng';
    }

    // Xuất ra file excel
    if (isset($_POST['export-excel'])) {
        Excel_Database::ExportExcel('Shippers', [['ID', 'Tên nhân viên', 'Số điện thoại']]);
    }

    // Xoá sản phẩm
    if (isset($_POST['del-id'])) {
        $sql = 'DELETE FROM Products WHERE ProductID = ' . $_POST['del-id'];
        Database::NonQuery($sql);
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
            <h2 class="text-center text-success">Danh sách sản phẩm</h2>
        </div>
        <div class="d-flex justify-content-between">
            <div class="mt-3 ms-3">
                <a href="add.php" class="btn btn-primary">Thêm mới</a href="add.php">
                <form action="#" method="POST" class="excel" enctype="multipart/form-data">
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
            <div class="mt-3 me-3">
                <form action="" method="GET">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="VD: Iphone">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID. </th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Nhà cung cấp</th>
                        <th>Danh mục</th>
                        <th width="69">Sửa</th>
                        <th width="69">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $search = " AND ProductName LIKE '%$search%' ";

                        $products = Database::GetData("SELECT * FROM products, categories, suppliers WHERE products.SupplierID = suppliers.SupplierID AND products.CategoryID = categories.CategoryID $search ORDER BY ProductID");
                        if ($products) {
                            foreach ($products as $product) {
                                echo '
                                <tr>
                                    <th scope="row">' . $product['ProductID'] . '</th>
                                    <td>' . $product['ProductName'] . '</td>
                                    <td>' . $product['Unit'] . '</td>
                                    <td>' . $product['Price'] . '</td>
                                    <td><img height="100" src="' . $product['Picture'] . '"/></td>
                                    <td>' . $product['SupplierName'] . '</td>
                                    <td>' . $product['CategoryName'] . '</td>
                                    <td><a href="edit.php?id=' . $product['ProductID'] . '" class="btn btn-success">Sửa</a></td>
                                    <td><a onclick="deleteRecord(' . $product['ProductID'] . ')" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            ';
                            }
                        } else {
                            echo '<tr class="text-center"><td colspan="5">Không có dữ liệu</td></tr>';
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
importExcel.onchange = function() {
    importExcel.parentElement.querySelector('button').click();
}

function deleteRecord(id) {
    if (confirm("Bạn có chắc chắn muốn xoá sản phẩm này không?")) {
        $.ajax({
            url: 'list.php',
            type: 'POST',
            data: {
                'del-id': id
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }
}
</script>

<?php include '../footer.php'?>