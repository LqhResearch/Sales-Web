<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    header('Location: dashboard/index.php');
} else {
    header('Location: dashboard/login.php');
}
