<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';
require_once 'app/models/Cart.php';
class ProductController{
    public function detail(){
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $category_id = $product['category_id'];
        $productRelative = $productModel->getProductRelative($category_id,$id);
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/product_infor/index.php';
      
    }

}