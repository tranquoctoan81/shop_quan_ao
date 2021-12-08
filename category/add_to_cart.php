<?php
if (isset($_GET['deleteProductItem'])) {
    if (isset($_GET['deleteProductItem']) && ($_GET['deleteProductItem'] >= 0)) {
        array_splice($_SESSION['cart'], $_GET['deleteProductItem'], 1);
    };
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
                $sumAllProduct = $sumAllProducts + 200;
                static $index = 0;
                echo '
                <tr>
                    <td width="10">
                        <a href="http://localhost/shop_quan_ao/accounts/accounts.php?redirect_account=addToCart&deleteProductItem=' . $index . '" class="icon_times">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                    <td width="20">
                        <div class="image">
                            <img src="https://360boutique.vn/wp-content/uploads/2021/11/da7afde9fc8437da6e95.jpg" alt=">
                        </div>
                    </td>
                    <td width="120"> ' . $key[0] . '</td>
                    <td width="120"> ' . $key[0] . '</td>
                    <td width="60">' . $key[4] . ' ₫</td>
                    <td width="60">' . $key[3] . ' </td>
                    <td width="60">' . $sum . '₫</td>
                </tr>
                
                ';
                $index++;
            }
            echo '
            <tr>
            <td style="text-align:center;font-size:1.4rem;" colspan="5">Tổng tiền</td>
            <td style=" font-size:1.4rem;" colspan="1">' . $sumAllProducts . '₫</td>
        </tr>
            </tbody>
            </table>
            <form action="category/order_now.php">
                <h3 class="colorWhile">Cộng giỏ hàng</h3>
                <div class="buy_container">
                    <div class="row">
                        <h6 class="colorWhile">Tạm tính</h6>
                        <p class="price_buy active colorWhile">' . $sumAllProduct . '₫</p>
                    </div>
                    <div class="row">
                        <h6 class="colorWhile">Tổng</h6>
                        <p class="price_buy colorWhile">' . $sumAllProducts . '₫</p>
                    </div>
                </div>
                <input type="submit" value="TIẾN HÀNH THANH TOÁN">
            </form>
            ';
        }
    }
}
?>
<div class="add_to_cart_container">
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tạm tính</th>
            </tr>
        </thead>
        <tbody>
            <?php showCart(); ?>
</div>
<style>
.icon_times {
    padding: .2rem .4rem;
    color: red;
}

.icon_times:hover {
    border-radius: 100%;
    color: #fff !important;
    background-color: red;
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
}


.image {
    width: 3.3rem;
    height: 4rem;
    overflow: hidden;
}

.image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

form {
    width: 60%;
    margin: 0 auto;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}

form h3 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #999;
    display: block;
    padding: 2rem 0 1rem;
}

form .buy_container {
    display: flex;
    justify-content: space-between;
}

form .buy_container div {
    width: 50%;
}

form .buy_container div h6 {
    font-size: 1.2rem;
    color: #999;
    padding-bottom: .5rem;
}

form .buy_container div .price_buy {
    font-size: 1.2rem;
}

form .buy_container div .price_buy.active {
    color: #999;
    text-decoration: line-through;
}

form input {
    padding: .7rem;
    color: #fff;
    margin-top: 1rem;
    font-weight: 500;
    letter-spacing: .1rem;
    cursor: pointer;
    transition: all .5s ease-in-out;
    outline: none;
    border: none;
    background: linear-gradient(90deg, #03a9f4, #f441a5);
}

.colorWhile {
    color: #eee !important;
}

form input:hover {
    color: #000;
}
</style>