<?php require_once 'public/layouts/admin/header.php'; ?>
<?php require_once 'public/layouts/admin/sidebar.php'; ?>
<div class="container">
    <h5 class="mt-4 mb-3">Thay đổi trạng thái đơn hàng</h5>
    <form action="index.php?controller=adminorder&action=updateStatus" method="post">
        <input type="hidden" name="id" value="<?php echo $order['id_chi_tiet_hd'] ?>">
        <select class="form-select my-2" aria-label="Default select example" name="status">
            <option value="">Cập nhật trạng thái đơn hàng</option>
            <option value="1" <?php if ($order['status'] == 'Đang xử lí') echo 'selected'; ?>>Đang xử lí</option>
            <option value="2" <?php if ($order['status'] == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
            <option value="3" <?php if ($order['status'] == 'Hoàn thành') echo 'selected'; ?>>Hoàn thành</option>
        </select>
        <button type="submit" class="btn btn-primary mt-4">Save changes</button>
    </form>
</div>
<?php require_once 'public/layouts/admin/footer.php'; ?>