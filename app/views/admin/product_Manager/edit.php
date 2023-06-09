<?php require_once 'public/layouts/admin/header.php'; ?>
<?php require_once 'public/layouts/admin/sidebar.php'; ?>

<div class="container my-3">
    <a href="index.php?controller=adminproduct&action=index" class="btn btn-primary mb-4"><-Quay lại</a>
    <form method="post" action="index.php?controller=adminproduct&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']?>">
        <div class="mb-2">
            <label for="exampleInput" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name_product" value="<?php echo $product['name']?>">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
            <img class="mt-2" src="public/img/<?php echo $product['image']?>" alt="" width="250px" style="object-fit: cover;" height="250px" id="img" />
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Giá</label>
            <input type="text" class="form-control" id="exampleCheck1" name="price" value="<?php echo $product['price']?>">
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Danh mục</label>
            <select class="form-select mb-2" name="category_id" aria-label="Default select example" value="<?php echo $category['id'] ?>">
                    <option>Open this select Category</option>
                    <?php foreach ($categories as $category) { ?>
                        <?php
                        if ($category['id'] == $product['category_id']) {
                            echo '<option selected value="' . $category['id'] . '">' . $category['name'] . '</option>';
                        } else {
                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                        }
                        ?>
                    <?php } ?>
            </select>
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Mô tả</label>
            <input type="text" class="form-control" id="exampleCheck1" name="description" value="<?php echo $product['description']?>">  
        </div>
        <div class="mb-2">
            <label class="form-check-label" for="exampleCheck1">Danh mục</label>
            <select class="form-select mb-2" name="status_id" aria-label="Default select example" value="<?php echo $status['id'] ?>">
                    <option>Open this select Category</option>
                    <?php foreach ($statuses as $status) { ?>
                        <?php
                        if ($status['id'] == $product['status_id']) {
                            echo '<option selected value="' . $status['id'] . '">' . $status['name'] . '</option>';
                        } else {
                            echo '<option value="' . $status['id'] . '">' . $status['name'] . '</option>';
                        }
                        ?>
                    <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-4" name="add">Lưu lại</button>
    </form>
</div>

<?php require_once 'public/layouts/admin/footer.php'; ?>