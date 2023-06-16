<?php require_once 'public/layouts/user/header.php' ?>
<?php require_once 'public/layouts/user/navbar.php' ?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Product Ordered</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Show Order</p>
        </div>
    </div>
</div>
<div class="container my-5">
    <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái đơn hàng</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach($orders as $order) {?>
                    <tr>
                        <td><?php echo $order['name'] ?></td>
                        <td><?php echo $order['size'] ?></td>
                        <td><?php echo $order['price'] ?></td>
                        <td><?php echo $order['so_luong'] ?></td>
                        <td><?php echo $order['so_luong']*$order['price'] ?></td>
                        <td><?php echo $order['ngay_lam_hd'] ?></td>
                        <td><?php echo $order['status'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
</div>
<?php require_once 'public/layouts/user/footer.php' ?>