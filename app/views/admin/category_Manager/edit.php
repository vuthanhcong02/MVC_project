<?php require_once 'public/layouts/admin/header.php'; ?>
<?php require_once 'public/layouts/admin/sidebar.php'; ?>

<div class="container my-3">
    <a href="index.php?controller=admincategory&action=index" class="btn btn-primary mb-4"><-Quay lại</a>
    <form method="post" action="index.php?controller=adminaccount&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $category['id']?>">
        <div class="mb-2">
            <label for="exampleInput" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="<?php echo $category['name']?>">
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Ngày tạo</label>
            <input type="date" class="form-control" id="exampleCheck1" name="created_at" value="<?php echo $category['created_at']?>">
        </div>
        <button type="submit" class="btn btn-primary my-4" name="add">Lưu lại</button>
    </form>
</div>

<?php require_once 'public/layouts/admin/footer.php'; ?>