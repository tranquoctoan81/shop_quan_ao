<?php
$connect = new mysqli("localhost", "root", "", "shop_quan_ao"); //connect database
mysqli_set_charset($connect, "utf8"); //lưu unicode(utf8) vào database ,nếu ko set thì font chữ xâu

if ($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
}