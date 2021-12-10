<form class="addProduct" action="" method="post" class="product-manager" enctype="multipart/form-data">
    <div class="form_item_add">
        <h3>Tên sản phẩm:</h3> <input required class="name" type="text" name="name"><br>
        <hr>
    </div>
    <div class="form_item_add">
        <h3>Nhóm sảm phẩm:</h3> <select required class="group" name="group">
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
        <h3>Loại sản phẩm:</h3> <select required class="type" name="type">
            <?php
            $result = selectTypeName($connect);
            while ($kq = mysqli_fetch_array($result)) {
            ?>
            <option value="<?php echo $kq['maloai'] ?>"><?php echo $kq['tenloai'] ?></option>
            <?php
            }
            ?>
        </select>

        <h3>Màu sắc:</h3> <select required class="color" name="color">
            <option value="Trắng">Trắng</option>
            <option value="Xanh">Xanh</option>
            <option value="Đỏ">Đỏ</option>
            <option value="Be">Be</option>
            <option value="Đen">Đen</option>
        </select> <br>
        <hr>
    </div>
    <div class="form_item_add">
        <h3>Size:</h3> <input class="size" type="text" name="size">
        <h3>Giá:</h3> <input class="price" type="text" name="price">
        <h3>Hình ảnh:</h3> <input class="image" type="file" name="image">
    </div>
    <div class="form_item_add">
        <h3>Mô tả:</h3><textarea required class="detail" name="detail" rows="" cols=""></textarea>
    </div>
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
input {
    border: none;
    outline: none;
}

form.addProduct {
    background-image: linear-gradient(to right, #25C481, #25BAB6);
    margin: 0 auto;
    padding: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    border-radius: 10px;
}

h3 {
    display: inline;
}

.form_item_add {
    margin: 0 auto;
    height: 25%;
    line-height: 500%;
    padding: 10px;
}

.name,
.size,
.price {
    font-size: 18px;
    width: 20%;
    height: 25%;
    border-radius: 10px;
    padding: 10px;
    background-color: #FFFFFF;
}

.group,
.type,
.color,
form.addProduct>div>.image {
    font-size: 18px;
    width: 15%;
    height: 25%;
    border-radius: 10px;
    padding: 10px;
    background-color: #FFFFFF;
}

.detail {
    width: 90%;
    height: 60%;
    border-radius: 10px;
    position: absolute;
    top: 1px;
    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #FFFFFF;
}

div {
    position: relative;
}

.add_shirt {
    padding: 5px;
    background-color: #FFFFFF;
    border: 100px;
    position: absolute;
    bottom: 0px;
    border-radius: 10px;
    cursor: pointer;
}
</style>