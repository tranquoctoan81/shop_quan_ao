<div id="header_acc">
    <a style="cursor: pointer;" href="index.php">Trang chủ</a>
    <p class="space">/</p>
    <p>Tài khoản</p>
</div>
<div class="account_content">
    <div class="login_wrapper">
        <div class="option_login">
            <h4>Nội dung trang</h4>
            <a href="">1: Đăng nhập</a>
            <a href="">2: Đăng ký</a>
        </div>
        <h3 class="accounts_title">Đăng nhập</h3>
        <form class="form_login" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
            <label for="account">Tên tài khoản hoặc địa chỉ email</label>
            <input required type="text" name="account" id="account">
            <label for="password">Mật khẩu</label>
            <input required type="password" name="password" id="password">
            <div class="submit_form">
                <input class="onSubmitLogin" name="submit_login" type="submit" value="Đăng nhập">
                <a href="">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit_login'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];
        $account_item = login($account, $connect);
        if ($account_item) {
            $item = mysqli_fetch_array($account_item);
            if (isset($item)) {
                $isValid = password_verify($password, $item['matkhau']);
                if ($isValid === true) {
                    session_start();
                    $_SESSION['username'] = $account;
                    if ($item['quyen'] == 1) {
                        echo 'this is a admin';
                        header('Location: http://localhost/shop_quan_ao/admin/admin.php');
                    } else {
                        header('Location: http://localhost/shop_quan_ao/');
                    }
    ?><script>
    alert('Đăng nhập thành công');
    </script><?php
                            } else {
                                ?><script>
    alert('Mật khẩu không hợp lệ. Vui lòng nhập lại!');
    </script><?php
                            }
                        } else {
                                ?><script>
    alert('Tài khoản không hợp lệ. Vui lòng nhập lại!')
    </script><?php
                        }
                    }
                }
                            ?>
    <div class="login_regiser">
        <h3 class="accounts_title">Đăng ký</h3>
        <form class="form_login" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
            <label for="account">Tên tài khoản hoặc địa chỉ email</label>
            <input required type="text" name="account" id="account">
            <label for="password">Mật khẩu</label>
            <input required type="password" name="password" id="password">
            <label for="password_confirm">Nhập lại mật khẩu</label>
            <input required type="password" name="password_confirm" id="password_confirm">
            <p class="register_desc">Thông tin cá nhân của bạn sẽ được sử dụng để tăng trải nghiệm sử dụng
                website, quản lý truy cập
                vào tài khoản của bạn, và cho các mục đích cụ thể khác được mô tả trong chính sách riêng tư.</p>
            <div class="submit_form">
                <input class="onSubmitLogin" name="submit_register" type="submit" value="Đăng ký">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit_register'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        if ($password !== $password_confirm) {
    ?><script>
    alert('Mật khẩu không trùng')
    </script><?php
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $result = createAcc($account, $hashed_password, $connect);
                        if ($result) {
                        ?><script>
    alert('Đăng ký thành công, mời bạn đăng nhập!')
    </script><?php
                        } else {
                            ?><script>
    alert('Đăng ký không thành công, vui lòng nhập lại thông tin')
    </script><?php
                        }
                    }
                }
                            ?>
</div>
<style>
.account_content .login_wrapper .option_login {
    border: none !important;
}

body {
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
}
</style>