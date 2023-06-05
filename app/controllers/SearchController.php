<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';

class SearchController{
    public function search(){
        // header ('Location: index.php?controller=product&action=index');
        $search =$_POST['keyword'];
    
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $productModel = new Product();
        // $products_search = $productModel->searchProduct($search);
       
        // if(isset($_POST['keyword'])){
        //     $products_search = $productModel->searchProduct($search);
        //     $id=$_GET['id'];
        //     $product = $productModel->getProductById($id);
        //     $category_id = $product['category_id'];
        //     $productRelative = $productModel->getProductRelative($category_id,$id);
        //     include 'app/views/shop/index.php';

        // }
        // else{
        //     $products = $productModel->getAllProduct();  
        //     include 'app/views/shop/index.php';
        // }
        // header ('Location: index.php?controller=shop&action=index');
    }
}