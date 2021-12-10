<?php
require '../model/connect.php';
require '../functions/index_funs.php';
if (isset($_GET['idProduct'])) {
    $id = $_GET['idProduct'];
    $selectNameType = selectNameTypeItem2($id, $connect);
    $selectNameTypeItem = mysqli_fetch_array($selectNameType);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once '../blocks/menu.php'; ?>
    <div class="product_detail_wrapper">
        <div id="header_acc">
            <a style="cursor: pointer;" href="../index.php">Trang chủ</a>
            <p class="space">/</p>
            <a style="cursor: pointer;" href="index.php">Sản phẩm</a>
            <p class="space">/</p>
            <a style="cursor: pointer;" href="index.php">Thời trang nam</a>
            <p class="space">/</p>
            <p><?php echo $selectNameTypeItem['tenloai']; ?></p>
        </div>
        <?php
        $selectProductsItem = selectProductsItem($id, $connect);
        $selectProductItem = mysqli_fetch_array($selectProductsItem);
        $shirt = [1, 2, 3, 4, 5, 6, 7, 8];
        $pants = [9, 10, 11, 12, 13];
        $accessories = [14, 15, 16, 17];
        ?>
        <div class="product_detail_content">
            <div class="image">
                <?php
                if (in_array($selectProductItem['maloai'], $shirt)) {
                    echo "
                    <img src='../admin/public/images_shirt/{$selectProductItem['img']}'>
            ";
                } elseif (in_array($id, $pants)) {
                    echo "
                    <img src='../admin/public/images_pants/{$selectProductItem['img']}'>
            ";
                } elseif (in_array($id, $accessories)) {
                    echo "
                    <img src='../admin/public/images_accessories/{$selectProductItem['img']}'>
            ";
                } else {
                    echo "
                    <img src='../admin/public/images_shoes/{$selectProductItem['img']}'>
            ";
                }
                ?>
            </div>
            <form class="config_order" action="" method="post">
                <p class="title_order"><?php echo $selectProductItem['tensanpham']; ?></p>
                <h5 class="price"><?php echo $selectProductItem['gia']; ?>đ</h5>
                <p class="guide_size">Hướng dẫn chọn size</p>
                <p class="color">Màu sắc</p>
                <div class="image_detail_wrapper">
                    <div class="box_color active"></div>
                    <div class="box_color"></div>
                    <div class="box_color"></div>
                    <div class="box_color"></div>
                    <div class="box_color"></div>
                </div>
                <div class="quantity_size">
                    <div class="size">

                        <?php
                        $size = selectProductsItem($id, $connect);
                        $arr = mysqli_fetch_array($size);
                        if ($arr['maloai'] == 18) {
                            echo '
                            <p>Cỡ</p>
                            <span class="size_span active">39</span>
                            <span class="size_span">40</span>
                            <span class="size_span">41</span>
                            <span class="size_span">42</span>
                            <span class="size_span">43</span>
                            <span class="size_span">44</span>
                            ';
                        } else {
                            echo '
                            <p>Kích cỡ</p>
                            <a class="size_select active" name="M" href="">M</a>
                            <a class="size_select" name="L" href="">L</a>
                            <a class="size_select" name="XL" href="">XL</a>';
                        }
                        ?>
                    </div>
                    <div class="quantity">
                        <p>Số lượng</p>
                        <input name="quantity" id="quantity" value="1" max="5000">
                    </div>
                </div>
                <div class="submit_form">
                    <div class="addToCart">
                        <input type="hidden" value="<?php echo $selectProductItem['tensanpham']; ?>"
                            name="product_name">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_product">
                        <input type="hidden" value="<?php echo $selectProductItem['gia']; ?>" name="price">
                        <input type="hidden" value="<?php echo $selectProductItem['mausac']; ?>" name="color">
                        <input value="Thêm vào giỏ hàng" class="onSubmitFormBy active" type="submit" name="addToCart">
                    </div>
                    <div class="byNow">
                        <input value="Mua ngay" class="onSubmitFormBy c" type="submit" name="orderByNow">
                    </div>
                </div>
                <div class="detail_service">
                    <p><strong>»&nbsp;BẢO HÀNH SẢN PHẨM&nbsp;90 NGÀY</strong></p>
                    <p><strong>»&nbsp;ĐỔI HÀNG TRONG VÒNG&nbsp;90 NGÀY</strong></p>
                    <p><strong>»&nbsp;HOTLINE BÁN HÀNG 1900 123 456</strong></p>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
if (isset($_POST['orderByNow'])) {
    echo 'dfsaaaaaaaaaaaaaaaaaaa';
}
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_POST['addToCart'])) {
    $name = $_POST['product_name'];
    $id = $_POST['id_product'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    //check sản phẩm có trong giỏ hàng chưa, có thì cộng dồn
    $flag_ok = true;
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][1] == $id) {
            $flag_ok = false;
            //cập nhật lại số lượng
            $quantity_new = $quantity + $_SESSION['cart'][$i][3];
            $_SESSION['cart'][$i][3] = $quantity_new;
            break;
        }
    }
    if ($flag_ok) {
        $arr = [$name, $id, $color, $quantity, $price];
        $_SESSION['cart'][] = $arr;
    }
}
?>

</html>
<script>
const onSubmitFormBy = document.querySelector('.onSubmitFormBy.active')
onSubmitFormBy.onclick = () => {
    alert('Thêm vào giỏ hành thành công!')
}
const size_span = document.querySelectorAll('.size_span');
size_span.forEach(item => {
    item.onclick = function() {
        document.querySelector('.size_span.active').classList.remove('active');
        this.classList.add('active');
    }
})
const size_select = document.querySelectorAll('.size_select');
size_select.forEach(size => {
    size.onclick = function(e) {
        e.preventDefault();
        document.querySelector('.size_select.active').classList.remove('active');
        this.classList.add('active');
    }
});
const select_image = document.querySelectorAll('.select_image');
select_image.forEach(image => {
    image.onclick = function(e) {
        e.preventDefault();
        document.querySelector('.select_image.active').classList.remove('active');
        this.classList.add('active');
    }
});
const box_color = document.querySelectorAll('.box_color');
box_color.forEach(box => {
    box.onclick = function(e) {
        document.querySelector('.box_color.active').classList.remove('active');
        this.classList.add('active');
    }
});
</script>
<style>
body {
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
}

.header_option .logo a {
    color: #eee;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.box_color {
    width: 2rem;
    height: 2rem;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    margin: 1.2rem .5rem;
    cursor: pointer;
}

.box_color.active {
    border: 5px solid #eee;
}

.box_color:nth-child(2) {
    background-color: blue;
}

.box_color:nth-child(3) {
    background-color: red;
}

.box_color:nth-child(4) {
    background-color: #FFCC66;
}

.box_color:nth-child(5) {
    background-color: #000;
}

.product_detail_wrapper {
    width: 1200px;
    margin: 0 auto;
}

#header_acc {
    display: flex;
    align-items: center;
    width: 100%;
    height: 4rem;
    background-color: #eee;
    padding-left: 1rem;
}

.image {
    width: 100%;
    overflow: hidden;
}

.image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#header_acc .space {
    padding: 0 .3rem;
}

#header_acc a,
#header_acc p {
    font-size: 1.2rem;
    color: #000;
    font-weight: 500;
    text-decoration: none;
}

.product_detail_content {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
}

.product_detail_content .image {
    width: 35%;
}

.product_detail_content .config_order {
    width: 60%;
}

.title_order {
    font-size: 2rem;
    margin: 0;
    font-weight: 300;
    color: rgb(104, 104, 104);
}

.image_detail_wrapper {
    display: flex;
}

.price {
    font-size: 1.8rem;
    color: red;
    font-weight: 300;
    margin: .5rem 0;
}

.quantity_size .quantity p,
.quantity_size .size p,
.color,
.guide_size {
    font-size: 1.3rem;
    font-weight: 500;
    color: rgb(104, 104, 104);
    padding-bottom: .3rem;
}

.image_detail {
    width: 14% !important;
    overflow: hidden;
    margin-right: 1rem;
    margin-bottom: 1rem;
    cursor: pointer;
    position: relative;
}

.quantity_size {
    display: flex;
    justify-content: space-between;
}

.quantity_size .size {
    width: 49%;
    align-items: center;
}

.quantity_size .size span {
    font-size: 1.3rem;
    border: .1rem solid #999;
    display: inline-block;
    height: 2.3rem;
    border-radius: 50%;
    padding: .3rem;
    margin-left: .7rem;
    cursor: pointer;
}

.quantity_size .size a {
    min-width: 30px;
    width: auto;
    padding: 0 5px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    display: block;
    float: left;
    margin-right: 5px;
    border: solid 1px #ddd;
    color: #505252;
    margin-bottom: 5px;
    margin-top: 5px;
    position: relative;
    text-decoration: none;
}

.quantity_size .size .size_span.active {
    border: .1rem solid red;
}

.select_image.active::before,
.quantity_size .size a.active::before {
    content: '';
    bottom: 0;
    right: 0;
    width: 14px;
    height: 14px;
    position: absolute;
    background: url('https://totoshop.vn/tp/T0235/img/bg-product.png');
}

.quantity_size .quantity {
    width: 49%;
}

.quantity_size .quantity input {
    width: 20%;
    height: 2rem;
    border: 1px solid #000;
    text-align: center;
    border-radius: 0;
    font-size: 1.1rem;
    margin-top: 5px;
}

.submit_form {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
}

.submit_form .addToCart {
    width: 49%;
}

.submit_form .byNow {
    width: 49%;
}

.onSubmitFormBy {
    margin-right: 2%;
    background: #fff;
    color: red;
    text-transform: uppercase;
    width: 100%;
    height: 2.7rem;
    font-weight: 500;
    cursor: pointer;
    font-size: 1.1rem;
    outline: none;
}


.submit_form .onSubmitFormBy.c {
    color: black;
}

.onSubmitFormBy:hover {
    background: rgb(221, 221, 221);
    border: none !important;
    outline: none;
}

.detail_service {
    display: flex;
    flex-direction: column;
    margin-top: 2rem;
}

.detail_service p {
    font-size: 1.3rem;
    margin: 0;
    font-weight: 300;
    color: rgb(104, 104, 104);
}
</style>