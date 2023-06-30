<?php
require_once 'app/models/user/Cart.php';
require_once 'app/models/user/Category.php';
class CartController{
    public function index(){
        $cartModel = new Cart();
        $carts = $cartModel->getCartItems();
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include 'app/views/cart/index.php';
        // echo '<pre>';
        // print_r($carts);
        // echo '</pre>';
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
            $user_id = $_POST['user_id'];
            $cartModel = new Cart();
            $cartModel->addToCart($id, $name, $price,$quantity, $size, $color, $image, $user_id);
            $carts= $cartModel->getCartItems();
       
            header('Location: index.php?controller=cart&action=index');
       
        }
        
        else{
            // header("location: index.php?controller=product&action=detail");
            echo "Vui lòng chọn size và màu sắc";
        }
     
    }
    public function del(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cartModel = new Cart();
            $cartModel->removeItemFromCart($id);
        }
        
       header('location: index.php?controller=cart&action=index');
    }
    public function checkout(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST')){
            if(isset($_POST['fullname'])&&isset($_POST['address'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['user_id'])){
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $user_id = $_POST['user_id'];
                $date = date('Y-m-d H:i:s');
                $note = $_POST['note'];
                $cartModel = new Cart();
                $orderId = $cartModel->createOrder($fullname, $email, $phone, $address, $note,$date, $user_id);
            }
            $carts = $cartModel->getCartItems();
            foreach ($carts as $item) {
                $productId = $item['productId'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $size= $item['size'];
                $cartModel->createOrderDetail($orderId, $productId, $size,$quantity,$price);
            }
            unset($_SESSION['cart']);
            header('location: index.php?controller=order&action=show');
        }
    }
    public function filter(){
        $price = $_POST['price'];
        echo $price;
    }
}