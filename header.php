<?php include_once dirname(__FILE__) . '/config/config.php'?>
<?php include_once dirname(__FILE__) . '/config/Database.php'?>
<?php include_once dirname(__FILE__) . '/config/Excel_Database.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý bán hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link ref="icon" href="../assets/img/favicon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .excel {
            position: relative;
            display: inline-block;
        }

        .excel input {
            position: absolute;
            top: 0;
            left: 0;
            width: 105px;
            height: 38px;
            opacity: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="p-5 text-center">
        <h1>Website quản lý bán hàng</h1>
        <p><i>Thực hành môn Thiết kế và lập trình website</i></p>
    </header>
