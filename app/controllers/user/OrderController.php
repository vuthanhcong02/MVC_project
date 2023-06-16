<?php
require_once 'app/models/user/Cart.php';
class OrderController{
    public function show(){
        $cartModel = new Cart();
        $orders = $cartModel->showOrder();
        include 'app/views/order/show.php';
    }
}