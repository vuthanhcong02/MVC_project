<?php
require_once 'app/models/Category.php';
class CheckoutController{
    public function index(){
        $categoryModel = new Category();
        $categories  = $categoryModel->getAllCategory();
        include 'app/views/checkout/index.php';
    }
}