<?php
require '../model/connect.php';
require '../functions/admin_funs.php';
if (isset($_GET['handle_product_id'])) {
    $idPro = $_GET['handle_product_id'];
    if (isset($_GET['delete_pro'])) {
        $deleteProduct = deleteProduct($idPro, $connect);
        if ($deleteProduct) {
?><script>
alert("Xóa thành công")
</script><?php
                    } else {
                        ?><script>
alert("Xóa không thành công")
</script><?php
                    }
                } elseif (isset($_GET['update_pro'])) {
                    echo 'cn';
                }
            }

            // news start
            if (isset($_GET['delete_news'])) {
                $idNew = $_GET['delete_news'];
                $deleteNews = deleteNews($idNew, $connect);
                if ($deleteNews) {
                        ?><script>
alert("Xóa thành công")
</script><?php
                } else {
                    ?><script>
alert("Xóa không thành công")
</script><?php
                }
            }


            if (isset($_GET['handle_product_id'])) {
                $idPro = $_GET['handle_product_id'];
                if (isset($_GET['delete_pro'])) {
                    $deleteProduct = deleteProduct($idPro, $connect);
                    if ($deleteProduct) {
                    ?><script>
alert("Xóa thành công")
</script><?php
                    } else {
                        ?><script>
alert("Xóa không thành công")
</script><?php
                    }
                } elseif (isset($_GET['update_pro'])) {
                    echo 'cn';
                }
            }

            // news end
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<?php
function showAllProduct()
{
    require '../model/connect.php';
    $selectAllProducts = selectAllProducts($connect);
    while ($selectAllProduct = mysqli_fetch_array($selectAllProducts)) {
        static $index = 1;
?>
<tr>
    <td><?php echo $index; ?></td>
    <td><?php echo $selectAllProduct['tensanpham']; ?></td>
    <td><?php echo $selectAllProduct['gia']; ?>₫</td>
    <td><?php echo $selectAllProduct['mausac']; ?></td>
    <td><?php echo $selectAllProduct['tenloai']; ?></td>
    <td><?php echo $selectAllProduct['tennhom']; ?></td>
    <td>
        <a class="update_product"
            href="./admin/update.php?handle_product_id=<?php echo $selectAllProduct['masanpham']; ?>&update_pro">Sửa</a>
        <a
            href="<?php echo $_SERVER['PHP_SELF']; ?>?handle_product_id=<?php echo $selectAllProduct['masanpham']; ?>&delete_pro">Xóa</a>
    </td>
</tr>
<?php
        $index++;
    }
}

function showAllNews()
{
    require '../model/connect.php';
    $selectNews = selectNewss($connect);
    while ($listNews = mysqli_fetch_array($selectNews)) {
        static $index = 1;
    ?>
<tr>
    <td><?php echo $index; ?></td>
    <td><?php echo $listNews['tieude']; ?></td>
    <td>
        <textarea name="" id="" cols="45" rows="5"><?php echo $listNews['chitiettin']; ?></textarea>
    </td>
    <td>
        <a href="./admin/update.php?update_news=<?php echo $listNews['matin']; ?>">Sửa</a>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?delete_news=<?php echo $listNews['matin']; ?>">Xóa</a>
    </td>
</tr>
<?php
        $index++;
    }
}
function showAccount()
{
    require '../model/connect.php';
    $i = selectAccount($connect);
    while ($a = mysqli_fetch_array($i)) {
        static $index = 1;
    ?>
<tr>
    <td><?php echo $index ?></td>
    <td><?php echo $a['taikhoan']; ?></td>
    <td><textarea name="" id="" cols="60" rows="2"><?php echo $a['matkhau']; ?></textarea></td>
    <td colspan="2"><?php echo $a['quyen']; ?>
    </td>
</tr>
<?php
        $index++;
    }
}
?>

<body>
    <div class="icon">
        <div class="cloud"><i class="fas fa-cloud-sun"></i></div>
        <div class="clou"><i class="fab fa-cloudflare"></i></div>
        <div class="tem"><i class="fas fa-temperature-low"><span>36</span><span class="active">o</span></i></div>
    </div>
    <div class="admin-container">
        <h1 class="admin-title">Trang chủ admin</h1>
        <div class="product_manager">
            <h1>Danh sách sản phẩm</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>giá</th>
                            <th>Màu sắc</th>
                            <th>Loại</th>
                            <th>Nhóm</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php showAllProduct(); ?>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn_add_product_handle">Thêm sản phẩm</a>
        </div>
        <div class="addProHidden">
            <h2>Thêm sản phẩm</h2>
            <?php require './classify/addProduct.php'; ?>
        </div>
        <div style="margin:6rem 0" class="news_manager">
            <h1>Danh sách tin tức</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Chi tiết tin</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php showAllNews(); ?>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn_add_news_handle">Thêm tin tức</a>
        </div>
        <div class="addNewsHidden">
            <h2>Thêm tin tức</h2>
            <?php require './classify/addNews.php'; ?>
        </div>
        <div style="margin:6rem 0" class="news_manager">
            <h1>Danh sách tài khoản</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th colspan="2">Quyền</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php showAccount(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
// const iconClose = document.querySelector('.iconClose')
// const form_update_product = document.querySelector('.form_update_product');
// const update_product = document.querySelectorAll('.update_product');
// const formHidden = document.getElementById('formHidden')
// update_product.forEach(item => {
//     item.onclick = function(e) {
//         // e.preventDefault();
//         const id = item.getAttribute('data-index')
//         formHidden.action = ` ?update_product_id=${id}`
//         form_update_product.classList.add('active')
//     }
// })
// iconClose.onclick = () => {
//     form_update_product.classList.remove('active')
// }
const btn_add_product_handle = document.querySelector('.btn_add_product_handle')
const btn_add_news_handle = document.querySelector('.btn_add_news_handle')
const addProHidden = document.querySelector('.addProHidden')
const addNewsHidden = document.querySelector('.addNewsHidden')
btn_add_product_handle.onclick = (e) => {
    e.preventDefault();
    addProHidden.classList.toggle('none')
}
btn_add_news_handle.onclick = (e) => {
    e.preventDefault();
    addNewsHidden.classList.toggle('none')
}
</script>

</html>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

.none {
    display: block !important;
}

.addProHidden,
.addNewsHidden {
    display: none;
}

.admin-container {
    width: 1200px;
    margin: 0 auto;
}

#addNews {
    margin-top: 5rem;
}

.btn_add_news_handle,
.btn_add_product_handle {
    color: #EFF8FE;
    font-weight: 400;
    text-decoration: none;
    padding: .5rem 1rem;
    font-size: 1.2rem;
    display: inline-block;
    margin-top: 1rem;
    border-radius: 1rem;
    background: -webkit-linear-gradient(left, #38E2FC, #35F2D9);
    background: linear-gradient(to right, #38E2FC, #35F2D9);
    cursor: pointer;
}

.btn_add_product_handle:hover {
    opacity: .8;
}

.admin-title {
    display: block;
    text-align: center;
    font-size: 3rem;
    margin-top: 4rem;
}

table {
    width: 100%;
}

table thead tr th,
table tbody tr td {
    text-align: center;
    font-size: 1.3rem;
}


table tbody tr {
    border-bottom: 1px solid #999;
}



h1 {
    font-size: 30px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
}

table {
    width: 100%;
    table-layout: fixed;
}

.tbl-header {
    background-color: rgba(255, 255, 255, 0.3);
}

.tbl-content {
    height: 300px;
    overflow-x: auto;
    margin-top: 0px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

th {
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
}

td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 12px;
    color: #fff;
    border-bottom: solid 1px rgba(255, 255, 255, 0.1);
}

textarea {
    color: #fff;
}

.form_update_product form,
textarea,
body {
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
}

::-webkit-scrollbar {
    width: 6px;
}

.tbl-content tbody tr a {
    color: #fff;
    outline: none;
    border: none;
    text-decoration: none;
    padding: .1rem .2rem;
    border-radius: .5rem;
    background-color: #25c481;
    font-size: 1.2rem;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.product_manager {
    margin: 1rem 0 2rem;
}

.icon {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5rem;
}

.tem,
.clou,
.icon .cloud {
    position: fixed;
    z-index: 1;
    font-size: 10rem;
    color: #fff;
}

.tem {
    right: 0;
    top: 0;
    font-size: 5rem;
}

.tem span {
    font-size: 3rem;
    position: relative;
}

.tem span.active {
    top: -2rem;
    font-size: .7rem;
}

.clou {
    left: 14rem;
}
</style>