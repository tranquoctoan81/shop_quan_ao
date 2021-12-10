<session id="addNews">
    <form class="addNews" action="" method="post" enctype="multipart/form-data">
        <h3>Hình ảnh:</h3> <input class="image" type="file" name="image"> <br>
        <h3>Tiêu đề:</h3> <input class="title" type="text" name="title">
        <h3>Mô tả tin tức:</h3> <textarea class="desc" name="desc" rows="" cols=""></textarea><br>
        <button type="submit" class="add_news" name="add_news">Thêm tin tức</button>
    </form>
</session>
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
<style>
* {
    margin: 0;
    padding: 0;
}

input {
    border: none;
    outline: none;
}

form.addNews {
    background-image: linear-gradient(to right, #25C481, #25BAB6);
    height: 300px;
    padding: 10px;
    position: relative;
    border-radius: 10px;
}

h3 {
    color: #440000;
    padding: 10px;
}

.title,
.desc {
    background-color: #FFFFFF;
    border-radius: 10px;
    padding: 10px;
    width: 95%;
}

form.addNews>.image {
    height: 40.8px;
}

.desc {
    height: 38%;
    border-radius: 10px;
}

.add_news {
    padding: 5px;
    background-color: #FFFFFF;
    border: 100px;
    position: absolute;
    bottom: 0px;
    border-radius: 10px;
    cursor: pointer;
}
</style>