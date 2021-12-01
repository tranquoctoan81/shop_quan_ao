<form action="" method="post" enctype="multipart/form-data">
    Hình ảnh: <input type="file" name="image">
    Tiêu đề: <input type="text" name="title">
    Mô tả tin tức: <textarea name="desc" rows="" cols=""></textarea>
    <button type="submit" name="add_news">Thêm tin tức</button>
</form>
<?php
if (isset($_POST['add_news'])) {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        move_uploaded_file($file_tmp, 'public/images_news/' . $file_name);
    }
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $connect = addNews($file_name, $title, $desc, $connect);
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