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
       
        if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['price'])&&isset($_POST['quantity'])&&isset($_POST['size'])&&isset($_POST['color'])&&isset($_POST['image'])){
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
            
            include 'app/views/cart/index.php';
        }
        else{
            // header("location: index.php?controller=product&action=detail");
            echo "Vui lòng chọn size và màu sắc";
        }
    }
}