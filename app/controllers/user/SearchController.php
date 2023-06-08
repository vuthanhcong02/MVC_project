<?php
require_once 'app/models/user/Product.php';
require_once 'app/models/user/Category.php';
require_once 'app/models/user/Cart.php';
class SearchController{
    public function search(){
       $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $search =$_POST['keyword'];
        $productModel = new Product();
        $products_search = $productModel->searchProduct($search);
        include 'app/views/shop/index.php';
    }
    public function detailProductSearch(){
        $id = $_GET['id'];
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $category_id = $product['category_id'];
        $productRelative = $productModel->getProductRelative($category_id,$id);
        include 'app/views/product_infor/index.php';
    }
}