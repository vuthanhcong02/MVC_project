<?php
session_start();
class AdminController{
    public function index(){
        if ($_SESSION['user'] && $_SESSION['user']['role'] == 'admin') {
            // Trang admin chỉ được truy cập khi đăng nhập với vai trò "admin"
            // Thực hiện các xử lý cho trang admin ở đây
            include 'app/views/admin/index.php';

        } else {
            // Nếu người dùng chưa đăng nhập hoặc không có vai trò "admin", chuyển hướng đến trang đăng nhập
            header('Location: index.php?controller=login&action=login');
            exit();
        }
    }
}