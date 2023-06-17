<?php
session_start();
require_once 'app/models/user/Account.php';
class RegisterController
{
    public function register()
    {
        include 'app/views/register/index.php';
    }
    public function registerAction()
    {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $confirm_password = $_POST['confirm-password'];
            
            //Validate username
            if (strlen($username) > 20) {
                $_SESSION['errorUsername'] = 'Tên người dùng không được quá 20 ký tự.';
            } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                $_SESSION['errorUsername'] = 'Tên người dùng chỉ được chứa chữ cái và số.';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errorEmail'] = 'Địa chỉ email không hợp lệ.';
            }
            // Validate password
            if (strlen($password) > 20) {
                $_SESSION['errorPassword'] = 'Mật khẩu không được quá 20 ký tự.';
            }

            // Kiểm tra nếu có lỗi, chuyển hướng về trang đăng ký
            if (isset($_SESSION['errorUsername']) || isset($_SESSION['errorPassword']) || isset($_SESSION['errorEmail'])) {
                header('Location: index.php?controller=register&action=register');
            }

            // Tiến hành đăng ký nếu không có lỗi
            if ($password == $confirm_password) {
                $user = new Account();
                $user->newAccount($username, $email, $password);
                header('Location: index.php?controller=login&action=login');
            } else {
                $_SESSION['errorConfirmPassword'] = 'Mật khẩu nhập lại không đúng.';
                header('Location: index.php?controller=register&action=register');
            }
        }
    }
}
