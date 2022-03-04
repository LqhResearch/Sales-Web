<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $unit = (isset($_POST['unit'])) ? $_POST['unit'] : '';
    $price = (isset($_POST['price'])) ? $_POST['price'] : '';
    $picture = (isset($_POST['picture'])) ? $_POST['picture'] : '';
    $supplier = (isset($_POST['supplier'])) ? $_POST['supplier'] : '';
    $category = (isset($_POST['category'])) ? $_POST['category'] : '';

    if (isset($_POST['picture'])) {
        echo "Please select a profile pic";
    } else {
        $image = $_FILES['picture']['tmp_name'];
        $image_name = $_FILES['picture']['name'];
        $image_size = $_FILES['picture']['size'];

        move_uploaded_file($_FILES["picture"]["tmp_name"], "../uploads/$image_name");

        $sql = "INSERT INTO Products VALUES (null, '$name', '$unit', '$price', '../uploads/$image_name', '$supplier', '$category')";
        if (Database::NonQuery($sql)) {
            $message = "Thêm thành công";
        }
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
            <h2 class="text-center text-success">Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Đơn vị tính:</label>
                        <select class="form-select" name="unit">
                            <option selected>-- Chọn danh mục --</option>
                            <option value="Chiếc">Chiếc</option>
                            <option value="Cái">Cái</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Giá:</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" name="picture">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Nhà cung cấp:</label>
                        <select class="form-select" name="supplier">
                            <option selected>-- Chọn nhà cung cấp --</option>
                            <?php
                            $suppliers = Database::GetData("SELECT * FROM Suppliers");
                            foreach ($suppliers as $item) {
                                echo '<option value="' . $item['SupplierID'] . '">' . $item['SupplierName'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="form-label">Danh mục:</label>
                        <select class="form-select" name="category">
                            <option selected>-- Chọn danh mục --</option>
                            <?php
                            $suppliers = Database::GetData("SELECT * FROM Categories");
                            foreach ($suppliers as $item) {
                                echo '<option value="' . $item['CategoryID'] . '">' . $item['CategoryName'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" name="submit">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'?>