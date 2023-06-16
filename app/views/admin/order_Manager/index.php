<?php require_once 'public/layouts/admin/header.php' ?>
<?php require_once 'public/layouts/admin/sidebar.php' ?>
<div class="my-4 container">
    <h4 class="text-center my-3">Danh sách đơn hàng</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Địa chỉ giao hàng</th>
                <th>Ngày làm hóa đơn</th>
                <th>Tên người đặt</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Ghi chú</th>
                <th>Trạng thái đơn hàng</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $order['name'] ?></td>
                    <td><img src="public/img/<?php echo $order['image'] ?>" width="100px" height="100px" object-fit="cover"></td>
                    <td><?php echo $order['size'] ?></td>
                    <td><?php echo $order['so_luong'] ?></td>
                    <td><?php echo $order['price'] ?></td>
                    <td><?php echo $order['dia_chi_gh'] ?></td>
                    <td><?php echo $order['ngay_lam_hd'] ?></td>
                    <td><?php echo $order['fullname'] ?></td>
                    <td><?php echo $order['phone'] ?></td>
                    <td><?php echo $order['email'] ?></td>
                    <td><?php echo $order['note'] ?></td>
                    <td>
                        <?php if($order['status']=='Đang xử lí') {?> 
                        <button class="btn btn-danger"><?php echo $order['status'] ?></button>
                        <?php } else if($order['status']=='Đang giao hàng') { ?>
                        <button class="btn btn-warning"><?php echo $order['status'] ?></button>
                        <?php } else{ ?>
                        <button class="btn btn-success"><?php echo $order['status'] ?></button>
                        <?php } ?>

                    </td>
                    <td>
                        <a href="index.php?controller=adminorder&action=edit&id=<?php echo $order['id_chi_tiet_hd'] ?>" type="button">
                            Update
                        </a>
                    </td>
                    <td><a href="index.php?controller=adminorder&action=delete&id=<?php echo $order['id_chi_tiet_hd'] ?>" type="button" onclick="return confirm('Are you sure?')">Xóa</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once 'public/layouts/admin/footer.php' ?>
<!-- SELECT chi_tiet_hoa_don.size,chi_tiet_hoa_don.so_luong,
		hoa_don.ngay_lam_hd,hoa_don.dia_chi_gh,hoa_don.status,hoa_don.fullname,hoa_don.phone,hoa_don.email,hoa_don.note,
        product.name,product.image,product.price

FROM `chi_tiet_hoa_don` JOIN hoa_don ON chi_tiet_hoa_don.id_hoadon = hoa_don.ma_hd 
								JOIN product ON chi_tiet_hoa_don.ma_sp = product.id -->