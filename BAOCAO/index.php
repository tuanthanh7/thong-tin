<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BÀI BÁO CÁO</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/sptheodm.css">
    <link rel="stylesheet" type="text/css" href="css/sanpham.css">
    <link rel="stylesheet" type="text/css" href="css/chitiet.css">
    <link rel="stylesheet" type="text/css" href="css/kqtimkiem.css">
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/dangky.css">
    <script src="js/test.js"></script>
</head>

<?php
session_start();

require "conn.php";
require "blocks/function.php";

if (isset($_GET["page-dangnhap"])) {
    require $_GET["page-dangnhap"];
} else if (isset($_GET["page-admin"]) and isset($_SESSION["loaitaikhoan"])) {
    require $_GET["page-admin"];
} else {
?>

    <body>

        <div class="trangchu">
            <div class="search-bar">
                <?php
                require "blocks/search.php";
                ?>
            </div>
            <div class="menu-bar">
                <?php
                require "blocks/menu.php";
                ?>
            </div>
            <div class="banner">BANNER</div>
            <div class="than">
                <?php
                if (isset($_GET["page"])) {
                    require $_GET["page"];
                } else {
                    require "blocks/sanpham.php";
                }
                ?>
            </div>
            <div class="footer">FOOTER</div>
        </div>
    <?php } ?>
    </body>

</html>