<?php
session_start();
require_once 'app/models/user/Account.php';
class LoginController{
    public function login(){   
         include 'app/views/login/index.php';
    }
    public function loginAction(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $account = new Account();
            $result = $account->getAccount($username, $password);
            if ($result) {
                $_SESSION['user'] = $result;
                if ($_SESSION['user']['role'] == 'admin') {
                    header('Location: index.php?controller=admin&action=index');
                    exit();
                } else {
                    header('Location: index.php?controller=home&action=index');
                    exit();
                }
            } else {
                $_SESSION['loginError'] = 'Sai tài khoản hoặc mật khẩu.';
                header('Location: index.php?controller=login&action=login');
                exit();
            }
        }
        
    }
}