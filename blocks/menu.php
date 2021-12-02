<div id="header">
    <div class="header_option">
        <div class="logo">
            <a href="http://localhost/shop_quan_ao/">SHOPQUANAO</a>
        </div>
        <div class="search_input">
            <form action="./category/search_list_key.php" method="get">
                <input name="nameProduct" type="text" placeholder="Tìm kiếm sản phẩm">
                <div class="icon_search_input">
                    <i class="fas fa-search"></i>
                </div>
            </form>
        </div>
        <div class="header_wrap_icon">
            <a style="color:#000;" href="http://localhost/shop_quan_ao/accounts/accounts.php?redirect_account=order"
                class="wrap_icon_item user_icon">
                <i class="fas fa-user-circle"></i>
            </a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<p class='user_name'>{$_SESSION['username']}</p>";
                $quantity_order = count($_SESSION['cart']);
            };
            ?>
            <div class="wrap_icon_item search_icon">
                <i class="fas fa-search"></i>
            </div>
            <div class="wrap_icon_item cart_icon">
                <i class="fas fa-shopping-cart"></i>
                <div class="quantity_order"><?php if (isset($quantity_order)) echo $quantity_order;
                                            else {
                                                echo '0';
                                            } ?></div>
            </div>
        </div>
    </div>

    <?php
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
                    echo '
                    <div class="cart_content">
                    <div class="cart_content_detail">
                        <a href="">' . $key[0] . '</a>
                        <div class="cart_content_detail_quantity">
                            <p>' . $key[3] . '</p>
                            <p>' . $key[4] . '₫</p>
                        </div>
                    </div>
                    <div class="icon_times">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                    ';
                }
                echo '
                <div class="cart_footer">
                <div class="cart_sum_price">
                    <h3>TỔNG TIỀN:</h3>
                    <p>' . $sumAllProducts . '₫</p>
                </div>
                <div class="cart_buy">
                    <a href="http://localhost/shop_quan_ao/accounts/accounts.php?redirect_account=addToCart">XEM GIỎ HÀNG</a>
                    <a href="">THANH TOÁN</a>
                </div>
            </div>
                ';
            }
        }
    }
    ?>
    <div class="dropdown_cart_right">
        <div class="cart_top">
            <h6>Giỏ hàng</h6>
            <div class="icon_times icon_close_dropdown_right">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <?php showCart(); ?>
    </div>

    <ul class="menu-container">
        <li><a href="">Sale Black FriDay</a>
            <div class="sub_menu">
                <div class="image">
                    <img src="https://360boutique.vn/wp-content/uploads/2021/11/da7afde9fc8437da6e95.jpg" alt="">
                </div>
            </div>
        </li>
        <li><a href="">Giới Thiệu</a></li>
        <li><a href="">Sản Phẩm</a>
            <div class="sub_menu sub-menu-product">
                <?php
                $result = getMenuGroup($connect);
                while ($n = mysqli_fetch_array($result)) {
                    $i = $n['manhom'];
                ?>
                <div class="sub-menu-item">
                    <h1>
                        <?php echo $n['tennhom'] ?>
                    </h1>
                    <ul>
                        <?php
                            $res = getMenuType($i, $connect);
                            while ($l = mysqli_fetch_array($res)) {
                            ?>
                        <li><a style="color:#000"
                                href="category/list_product_search.php?menu_type=<?php echo $l['maloai'] ?>">
                                <?php echo $l['tenloai'] ?>
                            </a></li>
                        <?php
                            }
                            ?>
                    </ul>
                </div>
                <?php
                }
                ?>
            </div>
        </li>
        <li><a href="">Bộ Sưu Tập</a>
            <div class="sub_menu"></div>
            <div class="sub_menu sub-menu-collection">
                <a href="">LookBook</a>
                <a href="">Set Đồ</a>
            </div>
        </li>
        <li><a href="">Khuyến Mại</a>
            <div class="sub_menu sub-menu-sale">
                <a href="">Sale 10%</a>
                <a href="">Sale 30%</a>
                <a href="">Sale 40%</a>
                <a href="">Sale 70%</a>
            </div>
        </li>
        <li><a href="">TinTức</a> </li>
        <li><a href="">Tuyển Dụng</a> </li>
        <li><a href="">Hệ Thống Cửa Hàng</a> </li>
    </ul>
</div>
<script>
const dropdown_cart_right = document.querySelector('.dropdown_cart_right');
const iconClose = document.querySelector('.icon_close_dropdown_right');
const cart_icon = document.querySelector('.cart_icon');
cart_icon.onclick = () => {
    dropdown_cart_right.classList.add('active')
}
iconClose.onclick = () => {
    dropdown_cart_right.classList.remove('active')
}
window.onscroll = () => {
    dropdown_cart_right.classList.remove('active')
}
</script>
<style>
.cart_icon {
    position: relative;
}

.dropdown_cart_right {
    padding: 4rem;
    position: absolute;
    width: 25%;
    height: 100vh;
    background-color: #fff;
    top: 0;
    z-index: 100;
    right: -30%;
    opacity: 1;
    transform: scale(.2);
    transition: all 1.2s cubic-bezier(1, -0.79, 0, 1.99);
}

.dropdown_cart_right.active {
    right: 0;
    transform: scale(1);
    opacity: 1;
    display: flex;
    flex-direction: column;
}

.cart_top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.cart_top h6 {
    font-size: 1.5rem;
    font-weight: 500;
    color: rgb(75, 75, 75);
    ;
}


.cart_top .icon_times {
    font-size: 2.2rem;
    font-weight: 500;
    cursor: pointer;
}

.cart_top .icon_times:hover {
    opacity: .5;
}

.quantity_order {
    position: absolute;
    top: -50%;
    right: -4%;
    padding: 0.1rem 0.4rem;
    border-radius: 100%;
    background-color: #1e85be;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
}

.user_name {
    color: #000;
    font-weight: bold;
    text-transform: uppercase;
    display: inline-block;
    margin-right: .3rem;
}

.dropdown_cart_right .cart_content {
    padding: 2rem 0.5rem 1rem 0.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center
}

.dropdown_cart_right .cart_content a {
    font-size: .9rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: rgb(75, 75, 75);
    display: inline-block;
}

.dropdown_cart_right .cart_content .cart_content_detail_quantity {
    display: flex;
    align-items: center;
}

.dropdown_cart_right .cart_content .cart_content_detail_quantity p:first-child {
    padding: .2rem .6rem;
    border: .1rem solid #000;
    margin-right: .5rem;
    background-color: #ededed;
}

.cart_footer {
    border-top: .2rem solid #000;
    padding: 1rem 0;
}

.cart_sum_price {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart_sum_price h3 {
    font-weight: 400;
    color: rgb(75, 75, 75);
}

.cart_buy {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart_buy a {
    text-align: center;
    width: 47%;
    padding: 1rem .5rem;
    border: .1rem solid #ccc;
    font-size: .8rem;
    font-weight: bold;
    margin-top: 2rem;
    background-color: #000;
    color: #fff;
}


.cart_buy a:hover {
    background-color: #eee;
    color: #000;
}

.icon_times {
    cursor: pointer;
}
</style>