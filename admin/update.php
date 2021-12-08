<?php
require '../model/connect.php';
require '../functions/admin_funs.php';
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
        <a class="update_product" data-index="<?php echo $selectAllProduct['masanpham']; ?>"
            href="<?php echo $_SERVER['PHP_SELF']; ?>?handle_product_id=<?php echo $selectAllProduct['masanpham']; ?>&update_pro">Sửa</a>
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
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?update_news=<?php echo $listNews['matin']; ?>">Sửa</a>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?delete_news=<?php echo $listNews['matin']; ?>">Xóa</a>
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
        </div>
        <?php
        function showInfoProduct()
        {
            require '../model/connect.php';
            if (isset($_GET['update_pro'])) {
                $id = $_GET['handle_product_id'];
                $resultProduct = selectProductsItems($id, $connect);
                $pro = mysqli_fetch_array($resultProduct);
                echo '
                <form method="POST" action="">
                <a href="./admin/admin.php" class="iconClose">
                    <i class="fas fa-times"></i>
                </a>
                <h4>Cập nhật sản phẩm</h4>
                <label for="name">Sản phẩm</label>
                <input value="' . $pro['tensanpham'] . '" name="name" type="text" id="name">
                <label for="price">Giá</label>
                <input value="' . $pro['gia'] . '" name="price" type="text" id="price">
                <label for="color">Màu</label>
                <input value="' . $pro['mausac'] . '" name="color" type="text" id="color">
                <label for="detail">Chi tiết</label>
                <textarea name="detail" id="detail">' . $pro['mota'] . '</textarea>
                <input name="handleFormUpdate" type="submit" value="Cập nhật">
                </form>
                ';
            } elseif (isset($_GET['update_news'])) {
                $idNews = $_GET['update_news'];
                $resultNews = selectIdNewss($idNews, $connect);
                $news = mysqli_fetch_array($resultNews);
                echo '
                <form method="POST" action="">
                <a href="./admin/admin.php" class="iconClose">
                    <i class="fas fa-times"></i>
                </a>
                <h4>Cập nhật tin tức</h4>
                <label for="name">Tiêu đề</label>
                <input value="' . $news['tieude'] . '" name="title" type="text" id="name">
                <label for="detail">Chi tiết</label>
                <textarea name="detail" id="detail">' . $news['chitiettin'] . '</textarea>
                <input name="handleFormUpdateNews" type="submit" value="Cập nhật">
                </form>
                ';
            }
        }
        ?>
        <div class="form_update_product">
            <?php showInfoProduct(); ?>
            <?php
            if (isset($_POST['handleFormUpdate'])) {
                $id = $_GET['handle_product_id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                $detail = $_POST['detail'];
                $check = updateProduct($id, $name, $price, $color, $detail, $connect);
                if ($check) {
            ?><script>
            alert('Cập nhật thành công')
            </script><?php
                            } else {
                                ?><script>
            alert('Cập nhật thất bại')
            </script><?php
                            }
                        }
                                ?>
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
                    <?php
                    if (isset($_POST['handleFormUpdateNews'])) {
                        $idNews = $_GET['update_news'];
                        $title = $_POST['title'];
                        $detailNews = $_POST['detail'];
                        $checkBo = updateNews($idNews, $title, $detailNews, $connect);
                        if ($checkBo) {
                    ?><script>
                    alert('Cập nhật thành công')
                    </script><?php
                                    } else {
                                        ?><script>
                    alert('Cập nhật thất bại')
                    </script><?php
                                    }
                                }
                                        ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
const iconClose = document.querySelector('.iconClose')
const form_update_product = document.querySelector('.form_update_product');
console.log(iconClose);
iconClose.onclick = () => {
    form_update_product.classList.add('active')
}
</script>

</html>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

.form_update_product {
    position: fixed;
    top: 0%;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .3s ease-in-out;
}

.form_update_product.active {
    top: -100%;
}

.form_update_product form {
    position: relative;
    padding: 2rem 2rem;
    width: 20%;
    height: 50%;
    background-color: aquamarine;
    display: flex;
    flex-direction: column;
}

.iconClose {
    position: absolute;
    top: 1rem;
    right: 2rem;
    font-size: 2rem;
    color: #fff;
    cursor: pointer;
}

.iconClose:hover {
    opacity: .6;
}

.form_update_product form h4 {
    font-size: 1.4rem;
    font-weight: bold;
    text-align: center;
    padding-bottom: -1rem;
}

.form_update_product form input {
    margin-bottom: 1rem;
    padding: .5rem;
    outline: none;
    border: none;
}

.form_update_product form textarea {
    padding: 1rem 1rem 2rem;
}

.form_update_product form label {
    padding: .3rem 0;
}

.form_update_product form input:last-child {
    font-size: 1.2rem;
    margin-top: 1rem;
    padding: .7rem;
    cursor: pointer;
    background: -webkit-linear-gradient(left, #6CF0EE, #B2EDEC);
    background: linear-gradient(to right, #6CF0EE, #B2EDEC);
}

.form_update_product form input:last-child:hover {
    opacity: .5;
}

.admin-container {
    width: 1200px;
    margin: 0 auto;
}

.admin-title {
    display: block;
    text-align: center;
    font-size: 3rem;
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