<?php
require_once 'app/models/Category.php';
require_once 'app/models/Product.php';
class HomeController{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $productModel = new Product();
        $trendy = $productModel->getAllTrendy();
        include 'app/views/home/index.php';
    }   
}