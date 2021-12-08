<div class="order_container">
    <h4>Bạn chưa có đơn hàng nào.
        <div class="icon_check"><i class="fas fa-check-circle"></i></div>
    </h4>
    <a href="">Tìm các sản phẩm</a>
</div>
<style>
.order_container {
    display: flex;
    justify-content: space-between;
    padding: 2rem;
    background-color: #f7f6f7;
    margin-left: 2rem;
    align-items: center;
}

.order_container h4 {
    position: relative;
    font-weight: 400;
    color: #000;
    padding-left: 2rem;
}

.order_container h4 .icon_check {
    position: absolute;
    top: 50%;
    left: 4%;
    transform: translate(-50%, -50%);
    color: #1e85be;
}

.order_container a {
    padding: .5rem .9rem 1rem;
    background-color: #ebe9eb;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.3rem;
    color: #000;
}

.order_container a:hover {
    background-color: #eee;
}
</style>