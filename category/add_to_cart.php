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
        </tbody>
    </table>
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
    border-top: .1rem solid #000;
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
    border: .1rem solid #000;
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
</style>