<?php
require './model/connect.php';
require './functions/index_funs.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <base href="http://localhost/shop_quan_ao/">
</head>

<body>
    <div id="container">
        <!-- require menu -->
        <?php require_once './blocks/menu.php'; ?>
        <!-- require menu end-->
        <!-- require content -->
        <?php require_once './blocks/content.php'; ?>
        <!-- require content end-->
        <!-- require footer -->
        <?php require_once './blocks/footer.php'; ?>
        <!-- require footer end-->
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".slide-show-wraper", {
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        }
    });
    </script>
</body>
<style>
.news_container {
    width: 1200px;
    margin: 0 auto;
}

.news-wrapper {
    --spacing: 2rem;
    --columns: 3;
    display: flex;
    flex-wrap: wrap;
    margin-left: calc(-1 * var(--spacing));
}

.news_item {
    width: calc(calc(100% / var(--columns)) - var(--spacing));
    margin-left: var(--spacing);
    overflow: hidden;
    cursor: pointer;
    display: block;
    text-align: center;
}

.news_item .image-news img {
    width: 100%;
    object-fit: cover;
}

.news_item .time_now {
    font-size: .8rem;
    text-transform: uppercase;
    color: #999;
    padding: .6rem 0;
}

.news_item .news_title {
    font-size: 1.3rem;
    text-transform: uppercase;
    color: #000;
    font-weight: 400;
    position: relative;
    padding-bottom: .7rem;
    display: -webkit-box;
    -webkit-line-clamp: .5;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
}

.news_item .news_title::after {
    position: absolute;
    content: "";
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 3.7rem;
    height: 2px;
    background: #f59505;
}

.news_item .news_desc {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
    padding: 1rem 0;
    font-size: 1rem;
    color: #000;
    line-height: 1.5;
    font-weight: 400;
}
</style>

</html>