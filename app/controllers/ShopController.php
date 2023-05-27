<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';
class ShopController {
    public function index(){
        $productModel = new Product();
        $products = $productModel->getAllProduct();
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/shop/index.php';
    }
}