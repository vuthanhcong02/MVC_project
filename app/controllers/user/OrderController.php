<?php
require_once 'app/models/user/Cart.php';
class OrderController{
    public function show(){
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];   
            $cartModel = new Cart();
            $orders = $cartModel->showOrder($user_id);
        }
    
        include 'app/views/order/show.php';
    }
}