<?php
session_start();
require_once 'app/models/admin/Product.php';
require_once 'app/models/user/Category.php';
require_once 'app/models/admin/ProductStatus.php';
class AdminProductController{
    public function index(){
        if ($_SESSION['user'] && $_SESSION['user']['role'] == 'admin') {
            // Trang admin chỉ được truy cập khi đăng nhập với vai trò "admin"
            // Thực hiện các xử lý cho trang admin ở đây
            $productModelAdmin = new Product();
            $products = $productModelAdmin->getAllProducts();
            $categoryModelUser= new Category();
            $categories = $categoryModelUser->getAllCategory();
            $productStatusModel = new ProductStatus();
            $statuses = $productStatusModel->getAllProductStatus();
            include 'app/views/admin/product_Manager/index.php';

        } else {
            // Nếu người dùng chưa đăng nhập hoặc không có vai trò "admin", chuyển hướng đến trang đăng nhập
            header('Location: index.php?controller=login&action=login');
            exit();
        }
      
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
    public function edit(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $productModelAdmin = new Product();
            $product = $productModelAdmin->getProductById($id);
            $categoryModelUser= new Category();
            $categories = $categoryModelUser->getAllCategory();
            $productStatusModel = new ProductStatus();
            $statuses = $productStatusModel->getAllProductStatus();
            include 'app/views/admin/product_Manager/edit.php';

       }
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $name = $_POST['name_product'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $status_id = $_POST['status_id'];
            $productModelAdmin = new Product();
            $productModelAdmin->updateProduct($id,$name,$image,$price,$description,$category_id,$status_id);
            header('location:index.php?controller=adminproduct&action=index');
        }
    }
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $productModelAdmin = new Product();
            $productModelAdmin->deleteProduct($id);
            header('location:index.php?controller=adminproduct&action=index');
        }
    }
}    