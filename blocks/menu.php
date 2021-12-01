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
    <div class="dropdown_cart_right">
        <div class="cart_top">
            <h6>Giỏ hàng</h6>
            <div class="icon_times">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="cart_content">

        </div>
        <div class="cart_footer"></div>
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
<style>
.cart_icon {
    position: relative;
}

.dropdown_cart_right {
    padding: 4rem;
    position: absolute;
    right: 0;
    width: 25%;
    height: 100vh;
    background-color: red;
    top: 0;
    z-index: 100;
}

.dropdown_cart_right.active {
    right: -30%;
    display: flex;
    flex-direction: column;
}

.cart_top {
    display: flex;
    justify-content: space-between;
    align-items: center
}

.cart_top h6 {
    font-size: 1.5rem;
    font-weight: 500;
}

.cart_top .icon_times {
    font-size: 2.5rem;
    font-weight: 500;
}

.cart_top .dropdown_cart_right .quantity_order {
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
</style>