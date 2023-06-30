<?php
require_once 'app/models/user/Category.php';
require_once 'app/models/user/Product.php';
class HomeController{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $productModel = new Product();
        $totalProduct_Trendy = $productModel->getTotalProductTrendy();
        $perPage_Trendy = 8;
        $totalPage_Trendy = ceil($totalProduct_Trendy/$perPage_Trendy);
        if (isset($_GET['pageTrendy'])) {
            $page_Trendy = $_GET['pageTrendy'];
        }else{
            $page_Trendy = 1;
        }
        $offset_Trendy = ($page_Trendy - 1) * $perPage_Trendy;
        $product_trendy = $productModel->getAllProductTrendy($perPage_Trendy,$offset_Trendy);
        $totalProduct_New = $productModel->getTotalProductNew();
        $perPage_New = 4;
        $totalPage_New = ceil($totalProduct_New/$perPage_New);
        if (isset($_GET['pageNew'])) {
            $page_New = $_GET['pageNew'];
          } else {
            $page_New = 1;
          }
        $offset_New = ($page_New - 1) * $perPage_New;
        $product_new = $productModel->getAllProductNew($perPage_New,$offset_New);
        include 'app/views/home/index.php';
    }   
}