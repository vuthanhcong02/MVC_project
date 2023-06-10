<?php require_once 'public/layouts/admin/header.php'; ?>
<?php require_once 'public/layouts/admin/sidebar.php'; ?>

<div class="container my-3">
    <a href="index.php?controller=adminaccount&action=index" class="btn btn-primary mb-4"><-Quay lại</a>
    <form method="post" action="index.php?controller=adminaccount&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $account['id']?>">
        <div class="mb-2">
            <label for="exampleInput" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $account['username']?>">
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Password</label>
            <input type="text" class="form-control" id="exampleCheck1" name="password" value="<?php echo $account['password']?>">
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Role</label>
            <input type="text" class="form-control" id="exampleCheck1" name="role" value="<?php echo $account['role']?>">
        </div>
        <button type="submit" class="btn btn-primary my-4" name="add">Lưu lại</button>
    </form>
</div>

<?php require_once 'public/layouts/admin/footer.php'; ?>