<?php require_once 'public/layouts/admin/header.php' ?>
<?php require_once 'public/layouts/admin/sidebar.php' ?>
<div class="my-4 container">
    <h4 class="text-center my-3">Danh sách danh mục</h4>
    <a class="my-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm danh mục
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><?php echo $category['created_at'] ?></td>
                <td>
                    <a href="index.php?controller=admincategory&action=edit&id=<?php echo $category['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="index.php?controller=admincategory&action=delete&id=<?php echo $category['id'] ?>" class="btn btn-danger"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')"
                    >Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php?controller=admincategory&action=add">
                        <div class="mb-2">
                            <label for="exampleInput" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="exampleCheck1">Ngày tạo</label>
                            <input type="date" class="form-control"name="created_at" required>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'public/layouts/admin/footer.php' ?>