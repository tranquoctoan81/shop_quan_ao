<?php
require '../model/connect.php';
require '../functions/index_funs.php';
?>
<?php
if (isset($_GET['nameProduct'])) {
    $name = $_GET['nameProduct'];
    $searchProduct = searchProduct($name, $connect);
    if ($searchProduct) {
        while ($search = mysqli_fetch_array($searchProduct)) {
?>
<h1></h1>
<?php
        }
    }
}
?>
<div class="search_list_container">
    <div id="header_acc">
        <a style="cursor: pointer;" href="../index.php">Trang chủ</a>
        <p class="space">/</p>
        <a style="cursor: pointer;" href="index.php">Sản phẩm quần áo nam thời trang nam mới nhất</a>
        <p class="space">/</p>
        <a style="cursor: pointer;" href="index.php">Kết quả tìm kiếm cho “<?php echo $name; ?>”</a>
        <p></p>
    </div>
    <div class="option_product_detail">
        <h3 class="product_title">Kết quả tìm kiếm: “<?php echo $name; ?>”</h3>
        <select class="select_orderby" name="orderby">
            <option value="defaultOrder">Thứ tự mặc định</option>
            <option value="popularity">Phổ biến nhất</option>
            <option value="date" selected="selected">Mới nhất</option>
            <option value="price">Giá thấp đến cao</option>
            <option value="price-desc">Giá cao xuống thấp</option>
        </select>
    </div>
    <div class="hot_product_container">
        <?php
        $shirt = [1, 2, 3, 4, 5, 6, 7, 8];
        $pants = [9, 10, 11, 12, 13];
        $accessories = [14, 15, 16, 17];
        if (isset($_GET['nameProduct'])) {
            $name = $_GET['nameProduct'];
            $searchProduct = searchProduct($name, $connect);
            if ($searchProduct) {
                while ($search = mysqli_fetch_array($searchProduct)) {
        ?>
        <a href="product_detail.php?idProduct=<?php echo $search['masanpham']; ?>" class="image_hot_product">
            <?php
                        if (in_array($search['maloai'], $shirt)) {
                            echo "
                    <img src='../admin/public/images_shirt/{$search['img']}'>
            ";
                        } elseif (in_array($search['maloai'], $pants)) {
                            echo "
                    <img src='../admin/public/images_pants/{$search['img']}'>
            ";
                        } elseif (in_array($search['maloai'], $accessories)) {
                            echo "
                    <img src='../admin/public/images_accessories/{$search['img']}'>
            ";
                        } else {
                            echo "
                    <img src='../admin/public/images_shoes/{$search['img']}'>
            ";
                        }
                        ?>
            <div class="product-detail">
                <div class="product-name">
                    <?php echo $search['tensanpham']; ?>
                </div>
                <div class="product-price">
                    <?php echo $search['gia']; ?>đ
                </div>
            </div>
        </a>
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, #25c481, #25b7c4);
    font-family: 'Roboto', sans-serif;
}

.product-detail .product-name {
    color: #000;
}

.product_title {
    font-size: 1.7rem;
    font-weight: bold;
    padding: 1rem 0;
    color: rgb(75, 75, 75);
}

.search_list_container {
    width: 1200px;
    margin: 3rem auto;
}

#header_acc {
    display: flex;
    align-items: center;
    width: 100%;
    height: 4rem;
    background-color: #eee;
    padding-left: 1rem;
}

#header_acc a,
#header_acc p {
    font-size: 1.2rem;
    color: #000;
    font-weight: 500;
    text-decoration: none;
}

#header_acc .space {
    padding: 0 .3rem;
}

.option_product_detail {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1.5rem 0;
}

.option_product_detail .select_orderby {
    font-size: .9rem;
    display: inline-block;
    height: 2rem;
    padding: 0 1.4rem 0 0;
    border-color: transparent;
    border-bottom: 1px solid #000;
    background-color: #fff;
    outline: 0;
    cursor: pointer;
    text-indent: 1px;
}

.hot_product_container {
    --spacing: 2rem;
    --columns: 5;
    display: flex;
    flex-wrap: wrap;
    margin-left: calc(-1 * var(--spacing));
}

.image_hot_product {
    width: calc(calc(100% / var(--columns)) - var(--spacing));
    margin-left: var(--spacing);
    margin-bottom: var(--spacing);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.image_hot_product img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image_hot_product .product-detail {
    padding: 1.3rem 0;
    position: absolute;
    bottom: -100%;
    width: 100%;
    text-align: center;
    background-color: #fff;
    opacity: .7;
    transition: all .4s ease-in-out;
}

.image_hot_product:hover .product-detail {
    bottom: 0;
    opacity: 1;
}

.image_hot_product .product-detail .product-price {
    color: red;
}
</style>