<?php include '../header.php'?>
<?php include '../sidebar.php'?>

<div class="container p-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-success">Danh sách shipper</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID. </th>
                        <th scope="col">Tên shipper</th>
                        <th scope="col">Số điện thoại</th>
                        <th width="130">Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $shippers = Database::GetData("SELECT * FROM Shippers");
                    foreach ($shippers as $shipper) {
                        echo '
                            <tr>
                                <th scope="row">' . $shipper["ShipperID"] . '</th>
                                <td>' . $shipper["ShipperName"] . '</td>
                                <td>' . $shipper["Phone"] . '</td>
                                <td>
                                    <a href="edit.php?id=' . $shipper["ShipperID"] . '" class="btn btn-warning">Sửa</a>
                                    <a href="?del-id=' . $shipper["ShipperID"] . '" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../footer.php'?>