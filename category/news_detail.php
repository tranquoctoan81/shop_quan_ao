<div class="detail_product">
    <div class="header_product"></div>
    <div class="detail_content_container">
        <div class="detail_content_left">
            <h3 class="active">BÀI VIẾT MỚI NHẤT</h3>
            <div class="dropdow_news">
                <?php
                require_once '../functions/index_funs.php';
                require_once '../model/connect.php';
                $arrNews = selectAllNews($connect);
                while ($selectItemNews = mysqli_fetch_array($arrNews)) {
                ?>
                <a class="news_item">
                    <div class="image">
                        <img class="active"
                            src="../admin/public/images_news/<?php echo $selectItemNews['anhtintuc']; ?>">
                    </div>
                    <div class="news_content">
                        <div class="news_content_title">
                            <?php echo $selectItemNews['tieude']; ?>
                        </div>
                        <div class="news_content_date"><?php echo $selectItemNews['create_date']; ?></div>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="detail_content_right">
            <?php
            if (isset($_GET['news_id'])) {
                $id = $_GET['news_id'];
                $selectIdNews = selectIdNews($id, $connect);
                $detailNewsId = mysqli_fetch_array($selectIdNews);
                echo '
                <h3>' . $detailNewsId['tieude'] . '</h3>
            <p style="margin-bottom:.5rem;">' . $detailNewsId['create_date'] . '</p>
            <div class="detail_content_detail">
                <img src="../admin/public/images_news/' . $detailNewsId['anhtintuc'] . '">
                <h5>' . $detailNewsId['chitiettin'] . '</h5>
            </div>
                ';
            }
            ?>
        </div>
    </div>
</div>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: rgb(75, 75, 75);
    margin-bottom: 1rem;
    padding-top: 1rem;
}

h3.active {
    padding: 1rem .5rem .5rem;
    display: block;
    text-align: center;
    border-bottom: .1rem solid #000;
}

.header_product {
    height: 3.5rem;
    background-color: #f5f5f5;
}

.detail_product {
    width: 1200px;
    margin: 3rem auto;
}

.detail_content_container {
    width: 90%;
    margin: 2rem auto;
    display: flex;
    justify-content: space-between
}

.detail_content_left {
    width: 30%;
    border: .2rem solid #f5f5f5;
    padding: 1rem;
}

.detail_content_right {
    width: 65%;
    border: .2rem solid #f5f5f5;
    padding: 1rem;
}

.dropdow_news {}

.news_item {
    margin-bottom: 2rem;
    display: flex;
    justify-content: space-between;
}

.news_item .image {
    height: 100%;
    width: 24%;
    flex-shrink: 0;
}

img {
    width: 100%;
    left: 100%;
    object-fit: cover;
}

img.active {
    height: 5rem;
}

.news_item .news_content {
    width: 70%;
    display: flex;
    flex-direction: column;
}

.news_item .news_content .news_content_title {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
    font-weight: 500;
}

.news_item .news_content .news_content_date {
    margin-top: auto;
    font-weight: 500;
    color: rgb(75, 75, 75);
}

.detail_content_detail h5 {
    display: block;
    margin: 1rem 0;
    font-size: 1.1rem;
    font-weight: 400;
    color: #000;
}
</style>