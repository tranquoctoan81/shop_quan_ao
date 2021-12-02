<?php
require '../model/connect.php';
require '../functions/admin_funs.php';
session_start();
$user =  $_SESSION['username'];
$resultAccount = login($user, $connect);
$id = mysqli_fetch_array($resultAccount);
if ($id['quyen'] == 0) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/shop_quan_ao/">
</head>

<body>
    <div class="admin-container">
        <h1 class="admin-title">Trang chủ admin</h1>
        <h2>Thêm sản phẩm</h2>
        <?php require_once './classify/addProduct.php'; ?>
        <h2>Thêm tin tức</h2>
        <?php require_once './classify/addNews.php'; ?>
    </div>
</body>

</html>
<style>
.admin-title {
    display: block;
    text-align: center;
    font-size: 3rem;
}
</style>