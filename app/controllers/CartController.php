<?php
require_once 'app/models/Cart.php';
class CartController{
    public function index(){
        $cartModel = new Cart();
        $carts = $cartModel->getCartItems();
        include 'app/views/cart/index.php';
    }
    public function add(){
        // include 'app/views/cart/index.php';
        $id=$_POST['id'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $image=$_POST['image'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $cartModel = new Cart();
        $cartModel->addToCart($id, $name, $price,$quantity, $size, $color, $image);
        $carts= $cartModel->getCartItems();
        
        // include 'app/views/cart/index.php';


    }
}