<div id="content">
    <div class="swiper slide-show-wraper">
        <div class="swiper-wrapper slide-show">
            <div class="swiper-slide image">
                <img src="https://360boutique.vn/wp-content/uploads/2021/11/1.jpg" alt="">
            </div>
            <div class="swiper-slide image">
                <img src="https://360boutique.vn/wp-content/uploads/2021/11/web-copy.jpg" alt="">
            </div>
            <div class="swiper-slide image">
                <img src="https://360boutique.vn/wp-content/uploads/2021/10/COVER-WEB.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="hot_product">
        <h1 class="header-product-title">SẢN PHẨM BÁN CHẠY</h1>
        <div class="hot_product_container">
            <?php
            $selectHotProducts = selectHotProduct($connect);
            while ($selectHotProduct = mysqli_fetch_array($selectHotProducts)) {
            ?>
            <a href="category/product_detail.php?idProduct=<?php echo $selectHotProduct['masanpham']; ?>"
                class="image_hot_product">
                <div class="image_pro"><img src="./admin/public/images_shirt/<?php echo $selectHotProduct['img']; ?>"
                        alt=""></div>
                <div class="product-detail">
                    <div class="product-name">
                        <?php echo $selectHotProduct['tensanpham']; ?>
                    </div>
                    <div class="product-price">
                        <?php echo $selectHotProduct['gia']; ?>đ
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="new_product">
        <h1 class="header-product-title">HÀNG MỚI VỀ</h1>
        <div class="hot_product_container">
            <?php
            $selectNewProducts = selectNewProduct($connect);
            while ($selectNewProduct = mysqli_fetch_array($selectNewProducts)) {
            ?>
            <a href="category/product_detail.php?idProduct=<?php echo $selectNewProduct['masanpham']; ?>"
                class="image_hot_product">
                <div class="image_pro"><img src="./admin/public/images_shirt/<?php echo $selectNewProduct['img']; ?>"
                        alt=""></div>
                <div class="product-detail">
                    <div class="product-name">
                        <?php echo $selectNewProduct['tensanpham']; ?>
                    </div>
                    <div class="product-price">
                        <?php echo $selectNewProduct['gia']; ?>đ
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>

    </div>
    <div class="news_container">
        <h1 class="header-product-title">TIN TỨC</h1>
        <div class="news-wrapper">
            <?php
            $selectNews = selectNews($connect);
            while ($selectNew = mysqli_fetch_array($selectNews)) {
            ?>
            <a href="category/news_detail.php?news_id=<?php echo $selectNew['matin']; ?>" class="news_item">
                <div class="image-news">
                    <img src="./admin/public/images_news/<?php echo $selectNew['anhtintuc']; ?>" alt="">
                </div>
                <div class="">
                    <div class="time_now"><?php echo $selectNew['create_date']; ?></div>
                    <div class="news_title"><?php echo $selectNew['tieude']; ?></div>
                    <div class="news_desc"><?php echo $selectNew['chitiettin']; ?></div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<style>
.product-name {
    color: #000;
}

.image_hot_product .product-detail {
    transition: all .5s ease-in-out;
}

.image_hot_product .image_pro {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.image_hot_product .image_pro img {
    transition: all 1s ease-out;
}

.image_hot_product:hover .image_pro img {
    transform: scale(.9);
}

.image_hot_product:hover .product-detail {
    bottom: 0;
    opacity: 1;
}
</style>