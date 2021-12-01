<div id="header_acc">
    <a style="cursor: pointer;" href="index.php">Trang chủ</a>
    <p class="space">/</p>
    <p>Tài khoản</p>
</div>
<div class="option_function_container">
    <div class="option_function">
        <a class="option_function_item" href="<?php echo $_SERVER['PHP_SELF']; ?>?redirect_account=order">Đơn hàng
            <div class="icon_logged">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </a>
        <a class="option_function_item" href="<?php echo $_SERVER['PHP_SELF']; ?>?redirect_account=addToCart">Giỏ hàng
            <div class="icon_logged">
                <i class="fas fa-download"></i>
            </div>
        </a>
        <a class="option_function_item" href="<?php echo $_SERVER['PHP_SELF']; ?>?redirect_account=address">Địa chỉ
            <div class="icon_logged">
                <i class="fas fa-home"></i>
            </div>
        </a>
        <a class="option_function_item" href="<?php echo $_SERVER['PHP_SELF']; ?>?redirect_account=accounts_info">Tài
            khoản
            <div class="icon_logged">
                <i class="fas fa-user-alt"></i>
            </div>
        </a>
        <a class="option_function_item" href="<?php echo $_SERVER['PHP_SELF']; ?>?exit=true">Thoát
            <div class="icon_logged">
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </a>
        <?php if (isset($_GET['exit'])) {
            session_start();
            unset($_SESSION['username']);
            header('Location: ../index.php');
        ?><script>
        alert('Đăng xuất thành công')
        </script><?php
                    } ?>
    </div>
    <div class="option_function_content">
        <?php
        if (isset($_GET['redirect_account'])) {
            $redirect_account = $_GET['redirect_account'];
            switch ($redirect_account) {
                case 'order':
                    require_once '../category/order.php';
                    break;
                case 'addToCart':
                    require_once '../category/add_to_cart.php';
                    break;
                case 'address':
                    require_once '../category/address.php';
                    break;
                case 'accounts_info':
                    require_once './accounts_info.php';
                    break;
            }
        }
        ?>
    </div>
</div>
<script>
const option_function_item = document.querySelectorAll('.option_function_item');
option_function_item.forEach(option_item => {
    option_item.onclick = function(e) {
        document.querySelector('.option_function_item.active').classList.remove('active');
        this.classList.add('active');
    }
});
</script>
<style>
#header_acc {
    display: flex;
    align-items: center;
    width: 100%;
    height: 4rem;
    background-color: #eee;
    padding-left: 1rem;
}

#header_acc .space {
    padding: 0 .2rem;
}

#header_acc a,
#header_acc p {
    font-size: 1.2rem;
    color: #000;
    font-weight: 500;
    text-decoration: none;
}

.option_function_container {
    width: 95%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
}

.option_function {
    width: 30%;
    display: flex;
    flex-direction: column;
}

.option_function a {
    display: block;
    padding: 1rem 3rem;
    text-decoration: none;
    color: #999;
    font-weight: bold;
    font-size: 1.3rem;
    border-top: .05rem solid #888;
    position: relative;
}

.option_function a.active,
.option_function a:hover {
    color: #000;
}


.option_function a:last-child {
    border-bottom: .05rem solid #888;
}

.option_function_content {
    width: 70%;
}

.icon_logged {
    position: absolute;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
}
</style>