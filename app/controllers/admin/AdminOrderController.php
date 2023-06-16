<?php
require_once 'app/models/admin/Order.php';
class AdminOrderController{
    public function index(){
        $orderModel = new Order();
        $orders = $orderModel->getAllOrders();
        include 'app/views/admin/order_Manager/index.php';
    }
    public function updateStatus(){
        $id = $_POST['id'];
        $status = $_POST['status'];
        echo $id;
        echo $status;
        $orderModel = new Order();
        $orderModel->upadateStatus($id, $status);
        header('Location: index.php?controller=adminorder&action=index');
    }
    public function edit(){
        $id = $_GET['id'];
        $orderModel = new Order();
        $order = $orderModel->getOrderById($id);
        include 'app/views/admin/order_Manager/edit.php';
    }
    public function delete(){
        $id = $_GET['id'];
        $orderModel = new Order();
        $orderModel->deleteOrder($id);
        header('Location: index.php?controller=adminorder&action=index');
    }
}