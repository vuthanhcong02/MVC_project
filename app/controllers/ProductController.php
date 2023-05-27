<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';
class ProductController{
    public function detail(){
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/product_infor/index.php';
    }
}