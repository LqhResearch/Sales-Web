<?php
class Database
{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "banhang_db";

    public static function GetData($sql)
    {
        $connect = new mysqli(self::$host, self::$username, self::$password, self::$dbname);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
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

    public static function NonQuery($sql)
    {
        $connect = new mysqli(self::$host, self::$username, self::$password, self::$dbname);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        $result = $connect->query($sql);
        $connect->close();
        return $result == TRUE;
    }
}
