<form action="" method="post" class="product-manager" enctype="multipart/form-data">
    Tên sản phẩm: <input class="name" type="text" name="name">
    Nhóm sảm phẩm: <select class="group" name="group">
        <?php
        $resu = selectGroupName($connect);
        while ($kq1 = mysqli_fetch_array($resu)) {
        ?>
        <option value="<?php echo $kq1['manhom'] ?>">
            <?php echo $kq1['tennhom'] ?>
        </option>
        <?php
        }
        ?>
    </select>
    Loại sản phẩm: <select name="type">
        <?php
        $result = selectTypeName($connect);
        while ($kq = mysqli_fetch_array($result)) {
        ?>
        <option value="<?php echo $kq['maloai'] ?>"><?php echo $kq['tenloai'] ?></option>
        <?php
        }
        ?>
    </select>
    Giá: <input type="text" name="price">
    Màu sắc: <select class="color" name="color">
        <option value="Trắng">Trắng</option>
        <option value="Xanh">Xanh</option>
        <option value="Đỏ">Đỏ</option>
        <option value="Be">Be</option>
        <option value="Đen">Đen</option>
    </select>

    Size: <input class="size" type="text" name="size">
    Hình ảnh: <input class="image" type="file" name="image">
    Mô tả: <input class="detail" type="text" name="detail">
    <button class="add_shirt" type="submit" name="add_shirt">Thêm sản phẩm</button>
</form>
<?php
if (isset($_POST['add_shirt'])) {
    $name = $_POST['name'];
    $group = $_POST['group'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        switch ($group) {
            case 1:
                $upload = move_uploaded_file($file_tmp, 'public/images_shirt/' . $file_name);
                break;
            case 2:
                $upload = move_uploaded_file($file_tmp, 'public/images_pants/' . $file_name);
                break;
            case 3:
                $upload = move_uploaded_file($file_tmp, 'public/images_accessories/' . $file_name);
                break;
            case 4:
                $upload = move_uploaded_file($file_tmp, 'public/images_shoes/' . $file_name);
                break;
        }
        $upload = move_uploaded_file($file_tmp, 'public/images_shirt/' . $file_name);
    }
    $detail = $_POST['detail'];
    $connect = addProduct($name, $type, $price, $color, $size, $file_name, $detail, $connect);
    if ($connect) {
?> <script>
alert('Upload thành công')
</script> <?php
                } else {
                    ?> <script>
alert('Upload không thành công')
</script> <?php
                }
            }
                    ?>
<style>
.product-manager {}
</style>