<?php
session_start();
require_once 'app/models/admin/Order.php';
class AdminOrderController{
    public function index(){
        if ($_SESSION['user'] && $_SESSION['user']['role'] == 'admin') {
            // Trang admin chỉ được truy cập khi đăng nhập với vai trò "admin"
            // Thực hiện các xử lý cho trang admin ở đây
            $orderModel = new Order();
            $orders = $orderModel->getAllOrders();
            include 'app/views/admin/order_Manager/index.php';

        } else {
            // Nếu người dùng chưa đăng nhập hoặc không có vai trò "admin", chuyển hướng đến trang đăng nhập
            header('Location: index.php?controller=login&action=login');
            exit();
        }
        
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