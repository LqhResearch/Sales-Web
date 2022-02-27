<?php
class Database
{
    private const HOST = "localhost";
    private const USERNAME = "root";
    private const PASSWORD = "";
    private const DBNAME = "banhang_db";

    /**
     * Tạo kết nối với CSDL
     */
    private static function Connect()
    {
        $connect = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        return $connect;
    }

    /**
     * Dùng để lấy về một bảng dữ liệu
     */
    public static function GetData($sql)
    {
        $connect = self::Connect();
        $result = $connect->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $connect->close();
        return $data;
    }

    /**
     * Dùng cho truy vấn INSERT, UPDATE, DELETE
     */
    public static function NonQuery($sql)
    {
        $connect = self::Connect();
        $result = $connect->query($sql);
        $connect->close();
        return $result == true;
    }
}
