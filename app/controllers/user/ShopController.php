<?php
require_once 'app/models/user/Product.php';
require_once 'app/models/user/Category.php';
class ShopController {
    public function index(){
        $productModel = new Product();
        $totalProduct = $productModel->getTotalProduct();
        $perPage = 6;
        $totalPage = ceil($totalProduct/$perPage);
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }
        $offset = ($page - 1) * $perPage;

        if(isset($_GET['id'])){
            $category_id = $_GET['id'];
            $products = $productModel->getProductByCategory($category_id);
        }
        else if(isset($_GET['price'])){
            if(($_GET['price'])=='l1'){
                $min_price = 5.00;
                $max_price = 10.00;
                $products = $productModel->getProductByPrice($min_price,$max_price);
            }
            if(($_GET['price'])=='l2'){
                $min_price = 10.00;
                $max_price = 20.00;
                $products = $productModel->getProductByPrice($min_price,$max_price);
            }
            if(($_GET['price'])=='l3'){
                $min_price = 20.00;
                $max_price = 30.00;
                $products = $productModel->getProductByPrice($min_price,$max_price);
            }
            if(($_GET['price'])=='l4'){
                $min_price = 30.00;
                $max_price = 50.00;
                $products = $productModel->getProductByPrice($min_price,$max_price);
            }
            if(($_GET['price'])=='l5'){
                $min_price = 50.00;
                $max_price = 1000.00;
                $products = $productModel->getProductByPrice($min_price,$max_price);
            }
            // $products = $productModel->getProductByPrice($_GET['price']);
            
        }
        else{
            $products = $productModel->getAllProduct($perPage,$offset);  
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/shop/index.php';
    }

}