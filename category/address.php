<form class="form_login" action='<?php echo $_SERVER['PHP_SELF']; ?>?redirect_account=address' method="post">
    <label style="text-align:center;" for="name">Thêm mới địa chỉ nhận hàng:</label>
    <label for="name">Tên người nhận hàng:</label>
    <input required type="text" name="name" id="name">
    <label for="area">Địa chỉ:</label>
    <select class="area" required name="area">
        <option>------choose------</option>
        <option value="Phuket">Phuket</option>
        <option value="Songkhla">Songkhla</option>
        <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
        <option value="Narathiwat">Narathiwat</option>
        <option value="Pattani">Pattani</option>
        <option value="Phang Nga">Phang Nga</option>
        <option value="Phatthalung">Phatthalung</option>
        <option value="Ranong">Ranong</option>
    </select>
    <label for="area_detail">Chi tiết:</label>
    <textarea name="area_detail" id="area_detail" rows="4" cols=""></textarea>
    <label for="phone_number">Số điện thoại:</label>
    <input required type="text" name="phone_number" id="phone_number">
    <div class="submit_form">
        <input class="onSubmitLogin" name="add_address" type="submit" value="Lưu">
        <a href=""></a>
    </div>
</form>

<?php
if (isset($_POST['add_address'])) {
    require_once '../functions/index_funs.php';
    require_once '../model/connect.php';
    $name = $_POST['name'];
    $area = $_POST['area'];
    $area_detail = $_POST['area_detail'];
    $phone_number = $_POST['phone_number'];
    $new_address = $area . ' - ' . $area_detail;
    // --------------------
    $account = $_SESSION['username'];
    $result = addInfoCustomer($name, $new_address, $phone_number, $account, $connect);
    if ($result) {
?><script>
alert('Thêm địa chỉ thành công')
</script><?php
                } else {
                    ?><script>
alert('Thêm địa chỉ thất bại!')
</script><?php
                }
            }
                    ?>

<style>
.form_login {
    border-left: #eee;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

textarea {
    padding: 1rem;
    font-size: 1.3rem;
    border: .1rem solid #eee;
    outline: none
}

.area {
    background-color: #eee;
    padding: 0.6rem 1rem;
    margin-bottom: 0.5rem;
    outline: none;
    border: none;
    border-radius: 0.5rem;
}
</style>