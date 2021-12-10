<?php
session_start();
function countCart()
{
    if (count($_SESSION['cart']) === 0) {
        echo '<h1 style="text-align:center">Bạn chưa thêm sản phẩm nào</h1>';
    } elseif (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $session_cart = $_SESSION['cart'];
            $sumAllProducts = 0;
            foreach ($session_cart as $key) {
                $sum = ($key[3] * $key[4]);
                $sumAllProducts += $sum;
                $sum1 = $sumAllProducts + 222;
            };
            echo '
                    <div class="price">
                        <div class="tamtinh">
                            <h6>Tạm tính</h6>
                            <p>' . $sumAllProducts . '₫</p>
                        </div>
                        <div class="phivanchuyen">
                            <h6>Phí vận chuyển</h6>
                            <p>222₫</p>
                        </div>
                    </div>
                    <div class="thanhtien">
                        <h5>Thành tiền</h5>
                        <p>' . $sum1 . ' ₫</p>
                    </div>
                ';
        }
    }
};
function showCart()
{
    if (count($_SESSION['cart']) === 0) {
        echo '<h1 style="text-align:center">Bạn chưa thêm sản phẩm nào</h1>';
    } elseif (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $session_cart = $_SESSION['cart'];
            $sumAllProducts = 0;
            foreach ($session_cart as $key) {
                $sum = ($key[3] * $key[4]);
                $sumAllProducts += $sum;
                $sumAllProduct = $sumAllProducts - 200;
                static $index = 0;
                echo '
                    <tr>
                        <td>' . $index . '</td>
                        <td>' . $key[0] . '</td>
                        <td>' . $key[4] . '₫</td>
                        <td>' . $key[3] . '</td>
                        <td>' .  $sum . '₫</td>
                    </tr>
                ';
                $index++;
            };
            echo '
            <tr>
                        <td style="text-align:center;font-size:1.4rem;" colspan="4">Tổng tiền</td>
                        <td style=" font-size:1.4rem;" colspan="1">' . $sumAllProducts . ' ₫</td>
                    </tr>
            ';
        }
    }
}
function checkAddress()
{
    require '../model/connect.php';
    require '../functions/index_funs.php';
    $arrResultAddress = selectAddress($_SESSION['username'], $connect);
    if ($arrResultAddress) {
        $address = mysqli_fetch_array($arrResultAddress);
        if (isset($address)) {
            echo '
            <h5>' . $address['tenkhachhang'] . '</h5>
                    <p>' . $address['diachi'] . '</p>
                    <p>Điện Thoại: ' . $address['sdt'] . '</p>
            ';
        } else {
            echo '
            <h5>Bạn chưa cũng cấp địa chỉ!</h5>
            <a style="text-decoration:underline;color:#000" href="http://localhost/shop_quan_ao/accounts/accounts.php?redirect_account=address"><p>Thêm địa chỉ</p></a>
            ';
        }
    } else {
        echo '2';
    }
}
function checkSubmit()
{
    echo '123';
}
?>
<form class="container">
    <div id="header_acc">
        <a style="cursor: pointer;" href="../index.php">Trang chủ</a>
        <p class="space">/</p>
        <a style="cursor: pointer;">Thanh toán</a>
    </div>
    <div class="order_now_content">
        <div class="list_product">
            <h3>Danh sách sản phẩm</h3>
            <table cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tạm tính</th>
                    </tr>
                </thead>
                <tbody>
                    <?php showCart(); ?>
                </tbody>
            </table>
            <input type="submit" onclick="<?php checkSubmit(); ?>" class="order_now_button" value="Đặt mua">
        </div>
        <div class="list_address">
            <div class="list_address_option">
                <h3>Địa chỉ giao hàng</h3>
                <a href="">Sửa</a>
            </div>
            <div class="info_address">
                <div class="info_address_top">
                    <?php checkAddress(); ?>
                </div>
                <div class="info_address_content">
                    <div>
                        <h3>Mã đơn hàng: 132465</h3>
                        <?php
                        $quantity_order = count($_SESSION['cart']);
                        if (isset($quantity_order)) {
                            echo '<h6>' . $quantity_order . ' sản phẩm</h6>';
                        } else {
                            echo '<h6>Bạn chưa thêm sản phẩm nào!</h6>';
                        }
                        ?>
                    </div>
                    <a href="http://localhost/shop_quan_ao/accounts/accounts.php?redirect_account=addToCart">Sửa</a>
                </div>
                <div class="info_address_bottom">
                    <?php countCart(); ?>
                </div>
            </div>
        </div>
    </div>
</form>
<style>
body {
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Roboto', sans-serif;
    list-style: none;
}

.container {
    display: flex;
    align-items: center;
    width: 1200px;
    margin: 3rem auto;
    height: 4rem;
    background-color: #eee;
    padding-left: 1rem;
    flex-direction: column;
}

#header_acc {
    line-height: 4rem;
    display: flex;
    align-items: center;
    width: 100%;
    height: 4rem;
    background-color: #eee;
    padding-left: 1rem;
}

#header_acc a,
#header_acc p {
    font-size: 1.2rem;
    color: #000;
    font-weight: 500;
    text-decoration: none;
}

#header_acc .space {
    padding: 0 .3rem;
}

.order_now_content {
    margin: 2rem 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.list_product {
    width: 65%;
}


.list_address h3,
.list_product h3 {
    font-size: 1.7rem;
    font-weight: bold;
    color: rgb(75, 75, 75);
    padding: 1.5rem .8rem;
}


tbody tr td {
    border-top: .1rem solid #999;
    margin-top: 1rem;
    padding: .5rem 0;
    align-items: center;
}

th {
    text-align: start;
}

table {
    padding: 1rem;
    width: 100%;
    border: .1rem solid #999;
}

.list_address {
    width: 28%;
    display: flex;
    flex-direction: column;
}

.list_address_option {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.list_address .list_address_option {
    border-bottom: .1rem solid #999;
}

.info_address_content a,
.list_address_option a {
    padding: .3rem .5rem;
    border: 1px solid #999;
    color: #000;
}

.info_address {
    padding: 1rem 0;
}

.info_address h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    padding-bottom: .5rem;
}

.info_address_top {
    padding: 0 .8rem;
}

.info_address p {
    font-size: 1rem;
    padding-bottom: .2rem;
}

.info_address_content {
    border-top: 1px solid #999;
    border-bottom: 1px solid #999;
    margin-top: .5rem;
    padding: 0 .8rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info_address_content h3 {
    font-size: 1.2rem;
    font-weight: bold;
    color: rgb(75, 75, 75);
    padding: 0.7rem 0;
}

.info_address_content h6 {
    font-size: 1rem;
    margin-top: -0.5rem;
}

.info_address_bottom {
    padding: 0 .8rem 1rem;
}

.info_address_bottom .phivanchuyen h6,
.info_address_bottom .tamtinh h6 {
    font-size: 1rem;
    font-weight: 300;
    margin-bottom: .5rem;
}

.info_address_bottom .price {
    padding: .8rem 0;
    margin-bottom: .5rem;
}

.thanhtien,
.info_address_bottom .phivanchuyen,
.info_address_bottom .tamtinh {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.thanhtien p {
    color: rgb(238, 35, 71);
    font-size: 19px;
    font-weight: 400;
}

.order_now_button {
    margin: 1rem 0px 0px;
    padding: 4px 12px;
    width: 360px;
    height: 50px;
    line-height: 2;
    color: rgb(255, 255, 255);
    font-size: 18px;
    border: 1px solid rgb(172, 34, 39);
    outline-color: rgb(204, 204, 204);
    border-radius: 3px;
    cursor: pointer;
    background: linear-gradient(rgb(239, 57, 89), rgb(215, 32, 65));
}

.order_now_button:hover {
    opacity: .7;
}

.box_address_hidden {
    display: none;
    position: absolute;
    z-index: 999;
    top: 50%;
    left: 50%;
    width: 30%;
    height: 70%;
    background-color: aqua;
    transform: translate(-50%, -50%);
    padding: 2rem;
}

.box_address_hidden h3 {
    font-size: 1.5rem;
    text-align: center;
}

.address_item {
    margin: .5rem 0 1rem;
}

.address_item p {
    margin-bottom: .2rem;
}
</style>