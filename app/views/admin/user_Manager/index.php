<?php require_once 'public/layouts/admin/header.php' ?>
<?php require_once 'public/layouts/admin/sidebar.php' ?>
<div class="container my-4">
    <h4 class="my-2">Danh sách tài khoản</h4>
    <a><a href="index.php?controller=adminaccount&action=add" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm tài khoản</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Role</th>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account) : ?>
                    <tr>
                        <td><?php echo $account['id'] ?></td>
                        <td><?php echo $account['username'] ?></td>
                        <td><?php echo $account['password'] ?></td>
                        <td><?php echo $account['role'] ?></td>
                        <td>
                            <a href="index.php?controller=adminaccount&action=edit&id=<?php echo $account['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php?controller=adminaccount&action=delete&id=<?php echo $account['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Delete</a>
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
                        <form method="post" action="index.php?controller=adminaccount&action=add" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label for="exampleInput" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-2">
                                <label class="form-check-label" for="exampleCheck1">Password</label>
                                <input type="text" class="form-control" id="exampleCheck1" name="password">
                            </div>
                            <div class="mb-2">
                                <label class="form-check-label" for="exampleCheck1">Role</label>
                                <input type="text" class="form-control" id="exampleCheck1" name="role">
                            </div>
                            <button type="submit" class="btn btn-primary my-4">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php require_once 'public/layouts/admin/footer.php' ?>