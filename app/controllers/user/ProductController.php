<?php
require_once 'app/models/user/Product.php';
require_once 'app/models/user/Category.php';
require_once 'app/models/user/Cart.php';
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