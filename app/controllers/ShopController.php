<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';
class ShopController {
    public function index(){
        $productModel = new Product();
        if(isset($_GET['id'])){
            $category_id = $_GET['id'];
            $products = $productModel->getProductByCategory($category_id);
        }
        else{
            $products = $productModel->getAllProduct();  
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/shop/index.php';
    }

}