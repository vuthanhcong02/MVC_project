<?php
require_once 'app/models/Category.php';
require_once 'app/models/Cart.php';
class CheckoutController{
    public function index(){
        $categoryModel = new Category();
        $categories  = $categoryModel->getAllCategory();
        $cartModel = new Cart();
        $carts = $cartModel->getCartItems();
        $subTotal = $cartModel->getSubTotal();
        include 'app/views/checkout/index.php';
    }
}