<?php require_once 'public/layouts/admin/header.php' ?>
<?php require_once 'public/layouts/admin/sidebar.php' ?>

<div class="container">
    <h5 class="text-center p-3">Danh sách sản phẩm</h5>
    <a type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm sản phẩm
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Mã sản phẩm</th>
                <th scope="col" class="text-center">Tên sản phẩm</th>
                <th scope="col" class="text-center">Ảnh</th>
                <th scope="col" class="text-center">Giá sản phẩm</th>
                <th scope="col" class="text-center">Danh mục</th>
                <th scope="col" class="text-center">Mô tả</th>
                <th scope="col" class="text-center">Trạng thái</th>
                <th scope="col" colspan="2" class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($products)){
                foreach ($products as $product){?>
            <tr>
                <th scope="row" class="text-center"><?php echo $product['id'] ?></th>
                <th scope="row" class="text-center"><?php echo $product['name'] ?></th>
                <td class="text-center">
                    <img src="public/img/<?php echo $product['image'] ?>" alt="" height="100px" style="object-fit: cover"/>
                </td>
                <td class="text-center"><?php echo $product['price'] ?></td>
                <td class="text-center"><?php echo $product['category'] ?></td>
                <td class="text-center"><?php echo $product['description'] ?></td>
                <td class="text-center"><?php echo $product['status'] ?></td>
                <td class="text-center">
                    <a><i class="fa fa-edit"></i></a>
                </td>
                <td class="text-center">
                    <a><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            
            <?php }}else{
                echo "Không có sản phẩm";
            } ?>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php?controller=adminproduct&action=add" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="exampleInput" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name_product">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image">
                            <img class="mt-2" src="" width="250px" style="object-fit: cover;" height="250px" id="img"  />
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="exampleCheck1">Giá</label>
                            <input type="text" class="form-control" id="exampleCheck1" name="price">
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="exampleCheck1">Danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option selected>Chọn danh mục</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="exampleCheck1">Mô tả</label>
                            <input type="text" class="form-control" id="exampleCheck1" name="description">
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="exampleCheck1">Danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="status_id">
                                <option selected>Chọn trạng thái sản phẩm</option>
                                <?php foreach ($statuses as $status) : ?>
                                    <option value="<?php echo $status['id'] ?>"><?php echo $status['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary my-4" name="add">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'public/layouts/admin/footer.php' ?>