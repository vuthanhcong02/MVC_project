<?php
require_once 'app/models/admin/Product.php';
require_once 'app/models/user/Category.php';
require_once 'app/models/admin/ProductStatus.php';
class AdminProductController{
    public function index(){
        $productModelAdmin = new Product();
        $products = $productModelAdmin->getAllProducts();
        $categoryModelUser= new Category();
        $categories = $categoryModelUser->getAllCategory();
        $productStatusModel = new ProductStatus();
        $statuses = $productStatusModel->getAllProductStatus();
        include 'app/views/admin/product_Manager/index.php';
    }
    public function add(){
        if(isset($_POST['add'])){
            $name = $_POST['name_product'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $status_id = $_POST['status_id'];
            // Kiểm tra và di chuyển tệp ảnh
            $uploadDirectory = 'public/img/';
            $uploadedFile = $uploadDirectory . basename($image);
            move_uploaded_file($image_tmp, $uploadedFile);

            $productModel = new Product();
            $productModel->newProduct($name,$image,$price,$description,$category_id,$status_id);
            header('location:index.php?controller=adminproduct&action=index');
        }
    }
}    